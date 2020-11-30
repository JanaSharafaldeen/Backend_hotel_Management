<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Mypro_contactQuery extends Model
{
    protected $table="mypro_contact_queries";
    protected $primaryKey="id";
    protected $fillable =['name' , 'email' , 'mobile_no' , 'message'];
    
}
