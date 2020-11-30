<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Mypro_subscribeUsers extends Model
{
    protected $table="mypro_subscribe_users";
    protected  $primaryKey="id";
    protected  $fillable=['email'];

}
