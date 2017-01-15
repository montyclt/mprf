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
 * A Filter Rule is the instructions for filter.
 */
class Rule
{
    /**
     * QueryString Key
     *
     * @var string
     */
    public $qs_key;

    /**
     * QueryString Value
     *
     * @var string
     */
    public $qs_value;

    /**
     * Rule
     *
     * @var int
     */
    public $rule;

    /**
     * Key for filter.
     *
     * @var string
     */
    public $key;

    /**
     * Value of rule
     *
     * @var mixed
     */
    public $value;

    /**
     * Rule constructor.
     *
     * @param string $qs_key
     * @param string $qs_value
     * @param int $rule
     * @param string $key
     * @param mixed $value
     */
    public function __construct($qs_key, $qs_value, $rule, $key, $value) {
        $this->qs_key = $qs_key;
        $this->qs_value = $qs_value;
        $this->rule = $rule;
        $this->key = $key;
        $this->value = $value;
    }
}