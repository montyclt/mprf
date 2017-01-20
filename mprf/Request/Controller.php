<?php namespace MPRF\Request;
/*
 * 2016 (c) Ivan Montilla <personal@ivanmontilla.es>
 * ivanmontilla.es (Author website)
 * mprf.io (MPRF website)
 *
 * Monty PHP Rest Framework (MPRF) is a framework to make Rest APIs in PHP.
 * You are free to use, adapt and redistribute this framework software.
 *
 * Get started in docs.mprf.io
 */
use MPRF\Environment\Environment;
use MPRF\Model\Log;

/**
 * In your controllers, extends this class and override the methods.
 *
 * @package Framework\Request
 */
abstract class Controller {

    /**
     * @var array
     */
    private $data = ["detail" => "HTTP Method (verb) is not allowed."];

    /**
     * @var Request
     */
    protected $request;

    private function __construct(Request $request) {
        $this->request = $request;
        $this->logCall();
    }

    /**
     * Override this method for allow GET request.
     *
     * @param Request $request
     * @return Response
     */
    function get(Request $request) {
        return new Response($this->data, Response::HTTP_405_METHOD_NOT_ALLOWED);
    }

    /**
     * Override this method for allow POST request.
     *
     * @param Request $request
     * @return Response
     */
    function post(Request $request) {
        return new Response($this->data, Response::HTTP_405_METHOD_NOT_ALLOWED);
    }

    /**
     * Override this method for allow PUT request.
     *
     * @param Request $request
     * @return Response
     */
    function put(Request $request) {
        return new Response($this->data, Response::HTTP_405_METHOD_NOT_ALLOWED);
    }

    /**
     * Override this method for allow PATCH request.
     *
     * @param Request $request
     * @return Response
     */
    function patch(Request $request) {
        return new Response($this->data, Response::HTTP_405_METHOD_NOT_ALLOWED);
    }

    /**
     * Override this method for allow DELETE request.
     *
     * @param Request $request
     * @return Response
     */
    function delete(Request $request) {
        return new Response($this->data, Response::HTTP_405_METHOD_NOT_ALLOWED);
    }

    /**
     * Override this function and return a Filter object with rules for
     * filter using querystring in GET request.
     *
     * @return Filter
     */
    function filter() {
        return null;
    }

    /**
     * Log the API Call to Database.
     */
    private function logCall() {
        $log = new Log();
        $log->method = $this->request->getHttpMethod();
        $log->endpoint = substr(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/', strlen(Environment::i()->getBasePath()));
        $log->ip_addr = $this->request->getClientIP();
        $log->save();
    }
}