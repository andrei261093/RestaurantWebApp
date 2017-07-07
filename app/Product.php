<?php
/**
 * Created by PhpStorm.
 * User: andreiiorga
 * Date: 01/07/2017
 * Time: 17:48
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name'];

    protected $table = 'Product';
    public $timestamps = false;
}