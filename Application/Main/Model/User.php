<?php namespace MontyCLT\HelloWord\Main\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 */
class User extends Model {
    use SoftDeletes;

//    protected $connection = 'test2';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'age'];
}