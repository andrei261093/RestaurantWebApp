<?php
/**
 * Created by PhpStorm.
 * User: andreiiorga
 * Date: 01/07/2017
 * Time: 18:51
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'imageUrl'];

    protected $table = 'Category';
    public $timestamps = false;


}