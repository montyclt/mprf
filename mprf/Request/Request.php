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

#TODO: Refactor class, more info in Trello.

/**
 * Class Request
 *
 * @package Framework\Request
 */
class Request {
    /**
     * URL parameters.
     *
     * @var array
     */
    private $params;

    /**
     * HTTP Method (verb) used in the request.
     *
     * @var string
     */
    private $httpMethod;

    /**
     * Body of the request in JSON format parsed to array.
     *
     * @var array
     */
    private $data;

    /**
     * QueryString parsed as array.
     *
     * @var array
     */
    private $queryArray;

    /**
     * Client IP Address.
     *
     * @var string
     */
    private $clientIP;

    /**
     * Request constructor.
     *
     * @param array $params
     */
    public function __construct($params) {
        $this->setHttpMethod();
        $this->setParams($params);
        $this->setData();
        $this->setQueryString();
        $this->setClientIP();
    }

    /**
     * Get one param using key.
     *
     * @param string $key
     * @return mixed
     */
    public function getParam($key) {
        return $this->params[$key];
    }

    /**
     * Return all params as array.
     *
     * @return array
     */
    public function getAllParams() {
        return $this->params;
    }

    /**
     * Set the current HTTP Method.
     */
    private function setHttpMethod() {
        $this->httpMethod = $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Get the current HTTP Method.
     */
    public function getHttpMethod() {
        return strtoupper($this->httpMethod);
    }

    /**
     * Set all params as array.
     *
     * @param array $params
     */
    private function setParams($params) {
        $this->params = $params;
    }

    /**
     * Get the client IP address as string.
     *
     * @return string
     */
    public function getClientIP() {
        return $this->clientIP;
    }

    /**
     * Get an associative array with the body of request sent as JSON.
     */
    public function getData() {
        return $this->data;
    }

    /**
     * Read the body of HTTP request, parse it to array and set it on the instance.
     */
    public function setData() {
        $this->data = json_decode(file_get_contents('php://input'), true);
    }

    /**
     * Return the QueryString as array.
     *
     * @return array
     * @internal param $key
     */
    public function getQueryString() {
        return $this->queryArray;
    }

    /**
     * Return only one field of the QuerySring
     *
     * @param string $field
     * @return string
     */
    public function getQueryStringField($field)
    {
        return $this->queryArray[$field];
    }

    /**
     * Parse the QueryString to array and set it on the instance.
     */
    public function setQueryString()
    {
        $this->queryArray = $_GET;
    }

    /**
     * Set client IP addr.
     */
    private function setClientIP() {
        $this->clientIP = $_SERVER['REMOTE_ADDR'];
    }
}