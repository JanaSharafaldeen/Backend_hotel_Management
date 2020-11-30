<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Mypro_service extends Model
{
    protected $table ="mypro_services";
    protected $primaryKey ="id";
    protected $fillable =[ 'title' ,'image' , 'description'] ;
}
