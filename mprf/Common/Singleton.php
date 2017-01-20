<?php namespace MPRF\Common;
/*
 * This file is part of MPRF Framework.
 *
 * 2017 (c) Ivan Montilla <personal@ivanmontilla.es>
 * ivanmontilla.es (Author website)
 * mprf.io (MPRF website)
 *
 * Monty PHP Rest Framework (MPRF) is a framework to make Rest APIs in PHP.
 * You are free to use, adapt and redistribute this framework software.
 *
 * Get started in docs.mprf.io
 */

/**
 * Use this trait in classes for implement Singleton pattern.
 *
 * @package Framework\Common
 * @author Ivan Montilla
 * @since B1/A-04/2017
 */
trait Singleton {

    /**
     * Instances of the children classes.
     *
     * @var array
     */
    private static $singleton_instances;

    /**
     * Private constructor to prevent instancing the class.
     */
    protected function __construct(){}

    /**
     * Prevent cloning a singleton.
     */
    final private function __clone(){}

    /**
     * Return the instance if instanced, else instance and the return the instance.
     *
     * @return self
     */
    public static function getInstance() {
        $class = get_called_class();

        if (!isset(self::$singleton_instances[$class])) {
            self::$singleton_instances[$class] = new $class();
        }
        return self::$singleton_instances[$class];
    }

    /**
     * Shortcut for getInstance.
     *
     * @return self
     */
    public static function i() {
        return self::getInstance();
    }
}