<?php namespace MPRF\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * This model is a wrapper to log the HTTP request to API in database.
 *
 * @package MPRF\Model
 */
class Log extends Model {
    public $timestamps = false;
}