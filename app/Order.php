<?php
/**
 * Created by PhpStorm.
 * User: andreiiorga
 * Date: 04/07/2017
 * Time: 16:46
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'FinalOrder';
    public $timestamps = false;
}