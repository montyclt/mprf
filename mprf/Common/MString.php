<?php namespace MPRF\Common;


/**
 * Class MString
 *
 * @package MPRF\Common
 * @author Ivan Montilla
 * @since 8/1/17
 */
class MString {

    /**
     * @var string
     */
    private $str;

    public function setValue($str) {
        $this->str = $str;
    }

    public function __construct($str) {
        $this->str = $str;
    }

    public function __toString() {
        return $this->str;
    }

    public function charAt($index) {
        return $this->str[$index];
    }

    public function concat($str) {
        $this->str .= $str;
    }

    public function contains($str) {
        return strpos($this->str, $str);
    }

    public function isEmpty() {
        return strlen($this->str) == 0;
    }

    public function length() {
        return strlen($this->str);
    }

    public function split($delimiter, $limit = null) {
        return explode($delimiter, $this->str, $limit);
    }

    public function hasPrefix($prefix) {
        return substr($this->str, 0, strlen($prefix)) == $prefix;
    }

    public function substring($index, $endIndex, $isLength = true) {
        return $isLength ? substr($this->str, $index, $endIndex) : substr($this->str, $index, $endIndex - $index);
    }

    public function toCharArray() {
        $arr = [];
        for ($i = 0; $i < strlen($this->str); $i++) {
            array_push($arr, $this->str[$i]);
        }
        return $arr;
    }

    public function toLowerCase() {
        return strtolower($this->str);
    }

    public function toUpperCase() {
        return strtoupper($this->str);
    }

    public function trim() {
        return trim($this->str);
    }
}