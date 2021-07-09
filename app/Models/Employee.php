<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['id', 'name','email', 'address','nid','date','phone','photo','created_at','updated_at'];
}
