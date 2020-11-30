<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Mypro_room_type extends Model
{
    protected $table = "mypro_room_types";
    protected $primaryKey ="id";
    protected $fillable = ['title' , 'status'];
}
