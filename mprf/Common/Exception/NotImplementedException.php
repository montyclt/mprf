<?php namespace MPRF\Common\Exception;
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

use Exception;

/**
 * This is a common exception for base method than need to be override for
 * implements it.
 *
 * @package Framework\Common\Exception
 */
class NotImplementedException extends Exception {
    public function __construct() {
        parent::__construct("This method is not implemented.");
    }
}