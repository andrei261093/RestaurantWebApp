<?php
/**
 * Created by PhpStorm.
 * User: andreiiorga
 * Date: 03/07/2017
 * Time: 12:56
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'Task';
    public $timestamps = false;
}