<?php namespace MPRF\Controller;
/*
 *
 */

use Exception;
use MPRF\Request\Response;

/**
 * Class Validator
 *
 * @package MPRF\Controller
 */
class Validator {

    //Actions
    const RETURN_BOOLEAN = 1;
    const THROW_EXCEPTION = 2;
    const RESPONSE_WITH_DETAILS = 3;

    /**
     * Array with the fields that must be validated and their validation rule.
     *
     * @var array
     */
    protected $rules = [];

    public function __construct($rules = null) {
        if ($rules) $this->setRules($rules);
    }

    public function setRules($rules) {
        foreach ($rules as $key => $rule) {
            if (!is_string($rule) and !is_string($key)) {
                throw new Exception("Rules' array bad formed.");
            }
            $this->rules = $rules;
        }
    }

    /**
     * Check if data "cumple" all rules. If "cumple", return true, else, do the action in second parameter.
     *
     * @param array $data
     * @param int $action
     * @return mixed
     * @throws Exception
     */
    public function validate($data, $action = self::RETURN_BOOLEAN) {
        $is_valid = true;
        $details = [];
        foreach ($this->rules as $itemName => $rule) {
            if (array_key_exists($itemName, $data)) {
                if (strpos(' ', $rule)) explode(' ', $rule);

            } else {
                if (strpos('required', $rule)) {
                    $is_valid = false;
                    array_push($details, "The $itemName is required.");
                }
            }
        }

        if (!$is_valid) {
            switch ($action) {
                case self::RETURN_BOOLEAN:
                    return false;
                    break;
                case self::THROW_EXCEPTION:
                    throw new Exception("Data not valid.");
                    break;
                case self::RESPONSE_WITH_DETAILS:
                    $response = new Response($details, Response::HTTP_409_CONFLICT);
                    $response->dispatch();
                    break;
                default: return false;
            }
        }
        return true;
    }

    /**
     * Check if the value contains only letters and numbers.
     *
     * @ValidationDetail {{value}} must be contained only with letters and numbers.
     * @param string $value
     * @return bool
     */
    static function alphanumeric($value) {
        return ctype_alnum($value);
    }

    /**
     * Check if the value start with capital letter.
     *
     * @ValidationDetail {{value}} must be started with capital letter.
     * @param string $value
     * @return bool
     */
    function capitalize($value) {

    }

    /**
     *
     *
     * @ValidationDetail {{value}} must be an integer number.
     * @param $value
     * @return bool
     */
    function integer($value) {
        return is_numeric($value);
    }

    /**
     *
     *
     * @ValidationDetail {{value}} must be a decimal number.
     * @param $value
     */
    function decimal($value) {

    }

    /**
     *
     *
     * @param string $value
     * @return bool
     */
    function integerPositive($value) {
        return is_integer($value) and $value > 0;
    }

    /**
     *
     *
     * @ValidationDetail {{value}} is required.
     * @param $value
     */
    function required($value) {

    }
}