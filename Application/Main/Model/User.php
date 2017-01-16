<?php namespace MontyCLT\HelloWord\Main\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 */
class User extends Model {
    use SoftDeletes;

    protected $fillable = ['name', 'age'];
    protected $hidden = ['deleted_at'];
}