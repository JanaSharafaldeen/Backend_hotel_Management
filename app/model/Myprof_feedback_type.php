<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Myprof_feedback_type extends Model
{
    protected $table ="myprof_feedback_types";
    protected $primaryKey = "id";
    protected $fillable = ['title' ,' status'];
}
