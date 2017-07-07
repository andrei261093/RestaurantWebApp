<?php
/**
 * Created by PhpStorm.
 * User: andreiiorga
 * Date: 02/07/2017
 * Time: 16:35
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Waiters extends Model
{
    protected $fillable = ['name'];

    protected $table = 'Waiter';
    public $timestamps = false;

}