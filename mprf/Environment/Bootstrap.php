<?php namespace MPRF\Environment;
/*
 * This file is part of Monty PHP Rest Framework.
 *
 * 2017 (c) Ivan Montilla <ivan@mprf.io>
 * mprf.io
 *
 * Monty PHP Rest Framework (MPRF) is a framework to make Rest APIs in PHP.
 * You are free to use, adapt and redistribute this framework software.
 *
 * Get started in docs.mprf.io
 */

use Whoops\Run as Whoops;
use Whoops\Handler\PrettyPageHandler;
use Illuminate\Database\Capsule\Manager as CapsuleManager;
use MPRF\Request\Router;
use MPRF\Request\Request;
use MPRF\Request\Response;

/**
 * Static class that initialize the framework, handle HTTP request and sent response.
 *
 * @package Framework\Environment
 * @author Ivan Montilla <ivan@mprf.io>
 * @since B1/A-07/2017
 */
final class Bootstrap {

    /**
     * Avoid any intent to initializing this class.
     */
    private function __construct(){}

    /**
     * Boot framework and handle the request.
     */
    public static function start() {
        define('MPRF', true);
        self::checkRequirementsOrDie();
        self::setEnvironmentRules();
        self::registerApplicationLoader();
        self::bootEloquent();
        self::handleRequest();
    }

    /**
     * Checks all requirements are fulfilled, and if not, die.
     */
    private function checkRequirementsOrDie() {
        if (!Environment::i()->isRequirementsFulfilled()) {
            die('Some requisites unsatisfied. Check it at docs.mprf.io/requirements');
        }
    }

    /**
     * Set a set of rules for the configured environment.
     */
    private static function setEnvironmentRules() {
        if (Environment::i()->isProductionEnvironment()) {
            error_reporting(0);
            ini_set('display_errors', false);
        } else {
            //Set whoops as error handler.
            $whoops = new Whoops();
            $whoops->pushHandler(new PrettyPageHandler());
            $whoops->register();
        }
    }

    /**
     * Register class loader for applications.
     */
    private static function registerApplicationLoader() {
        spl_autoload_register(function ($class) {
            if (Environment::i()->isAuthorRequired()) {
                $prefix = Environment::i()->getAPIAuthor() . '\\' . Environment::i()->getAPIName();
            } else {
                $prefix = Environment::i()->getAPIName();
            }
            $class = explode('\\', $class);
            if ($class[0] . '\\' . $class[1] == $prefix) {
                $class = array_slice($class, 2);
                $route = 'Application/';
                foreach ($class as $separator) {
                    $route .= $separator . '/';
                }
                $route = rtrim($route, '/') . '.php';
                require_once($route);
            }
        });
    }

    /**
     * Boot Eloquent ORM.
     */
    private static function bootEloquent() {
        $capsuleManager = new CapsuleManager();
        foreach (Environment::i()->getConnections() as $connection) {
            $capsuleManager->addConnection($connection);
        }
        $capsuleManager->setAsGlobal();
        $capsuleManager->bootEloquent();
    }

    /**
     * Handle the request and send the response.
     */
    private static function handleRequest() {
        $router = self::getConfiguredRouter();
        $route = $router->match();

        if (!$router->match()) {
            $response = new Response(['detail' => 'The requested URL not found.'], Response::HTTP_404_NOT_FOUND);
            $response->dispatch();
            return;
        }

        $request = new Request($route['params']);

        call_user_func_array([new $route['target'](), strtolower($_SERVER['REQUEST_METHOD'])], [$request])
            ->dispatch();
    }

    /**
     * Configure the router and get it.
     */
    private static function getConfiguredRouter() {
        $router = new Router();
        $router->setBasePath(Environment::i()->getBasePath());
        $router->registerRoutesFromFile();

        return $router;
    }
}