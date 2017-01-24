<?php namespace MPRF\Environment;
/*
 * 2017 (c) Ivan Montilla <contact@ivanmontilla.es>
 * ivanmontilla.es (Author website)
 * mprf.io (MPRF website)
 *
 * Monty PHP Rest Framework (MPRF) is a framework to make Rest APIs in PHP.
 * You are free to use, adapt and redistribute this framework software.
 *
 * Get started in docs.mprf.io
 */

use Exception;
use MPRF\Common\Singleton;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

/**
 * Singleton class with Environment.
 *
 * @package Framework\Core
 * @author Ivan Montilla <contact@ivanmontilla.es>
 * @since B1/A-04/2017
 */
final class Environment {
    use Singleton;

    const CONFIG_FILE = "Application/Config.yml";
    const ROUTES_FILE = "Application/Routes.yml";
    const FW_REVISION = "B1/A-19/2017";

    /**
     * Associative array with framework configurations.
     *
     * @var array
     */
    private $config;

    /**
     * Environment constructor.
     *
     * Fill the config array.
     *
     * @throws Exception
     * @since B1/A-05/2017
     */
    function __construct() {
        $this->fillConfigArray();
    }

    /**
     * Read Config.yml and fill config array with the file data.
     *
     * @throws Exception
     * @since B1/A-05/2017
     */
    private function fillConfigArray() {
        try {
            $this->config = Yaml::parse(file_get_contents(self::CONFIG_FILE));
        } catch (ParseException $e) {
            throw new Exception("The config file is bad formed: " . $e->getMessage(), -21, $e);
        }
    }

    /**
     * Check if the environment configuration is set to production.
     *
     * @since B1/A-04/2017
     * @return bool
     */
    public function isProductionEnvironment() {
        return (bool)$this->config["Production"];
    }

    /**
     * Get the basepath of your API.
     *
     * @since B1/A-04/2017
     * @return string|null
     */
    public function getBasePath() {
        $basepath = $this->config['Basepath'] ? $this->config['Basepath'] : null;
        if (!$this->isHiddenIndex()) $basepath .= '/index.php';
        return $basepath;
    }

    /**
     * Get the revision of framework.
     *
     * @since B1/A-04/2017
     * @return string
     */
    public function getFWRevision() {
        return self::FW_REVISION;
    }

    /**
     * Get the version of your API.
     *
     * @since B1/A-04/2017
     * @return string
     */
    public function getAPIVersion() {
        return $this->config['APIVersion'];
    }

    /**
     * Get the name of the API's author.
     */
    public function getAPIAuthor() {
        return $this->config['APIAuthor'];
    }

    /**
     * Get the name of your API.
     *
     * @since B1/A-04/2017
     * @return string
     */
    public function getAPIName() {
        return $this->config['APIName'];
    }

    /**
     * Return true when all requirements are satisfied.
     *
     * @since B1/A-06/2017
     * @return bool
     */
    public function isRequirementsFulfilled() {
        return version_compare(phpversion(), '5.6') >= 0;
    }

    /**
     * Return and array of connections that is accepted by the capsule manager.
     *
     * @since B1/A-07/2017
     * @return array
     */
    public function getConnections() {
        return $this->config['DatabaseCredentials'];
    }

    /**
     * Return true if the server has enabled some renaming module that hide index.php
     *
     * @since B1/A-20/2017
     * @return bool
     */
    public function isHiddenIndex() {
        return (bool)$this->config['HiddenIndex'];
    }

    /**
     *
     *
     * @since B1/A-24/2017
     * @return bool
     */
    public function isAuthorRequired() {
        return (bool)$this->config['AuthorRequired'];
    }
}