<?php namespace MPRF\Request\Filter;
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

/**
 * This class allows make filters using QueryString on GET calls.
 */
class Filter {
    const LOWER = 1;
    const LOWER_EQUALS = 2;
    const GREATER = 3;
    const GREATER_EQUALS = 4;
    const EQUALS = 5;
    const NOT_EQUALS = 6;
    const CONTAINS = 7;

    /**
     * @var Rule[]
     */
    private $rules = [];

    /**
     * Add new filter rule.
     *
     * @param string $qs_key
     * @param string $qs_value
     * @param int $rule
     * @param string $key
     * @param mixed $value
     */
    public function addRule($qs_key, $qs_value, $rule, $key, $value) {
        array_push($this->rules, new Rule($qs_key, $qs_value, $rule, $key, $value));
    }

    /**
     * Filter data with rules.
     *
     * @param array $data
     */
    public function filterData(&$data) {
        foreach ($this->rules as $rule) {
            switch ($rule->rule) {
                case self::LOWER:
//                    $data[]
            }
        }
    }
}