<?php
/**
 * Created by PhpStorm.
 * User: andreiiorga
 * Date: 02/07/2017
 * Time: 16:51
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = ['zone'];

    protected $table = 'Zone';
    public $timestamps = false;
}