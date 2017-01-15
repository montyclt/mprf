<?php namespace MPRF\Common;


class Email {
    private $to;
    private $body;
    private $headers;

    /**
     * Email constructor.
     *
     * @param $to
     * @param $body
     * @param $header
     */
    public function __construct($to, $body, $header) {
        $this->setTo($to);
        $this->setBody($body);
        $this->setHeaders($header);
    }

    /**
     * @return mixed
     */
    public function getHeaders() {
        return $this->headers;
    }

    /**
     * @param mixed $headers
     */
    public function setHeaders($headers) {
        $this->headers = $headers;
    }

    /**
     * @return mixed
     */
    public function getTo() {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to) {
        $this->to = $to;
    }

    /**
     * @return mixed
     */
    public function getBody() {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body) {
        $this->body = $body;
    }

    /**
     * Send the message.
     */
    public function send() {

    }
}