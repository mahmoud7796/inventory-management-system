<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";
    protected $fillable = ['id', 'name','email', 'address','nid','date','phone','salary','photo','created_at','updated_at'];
}
