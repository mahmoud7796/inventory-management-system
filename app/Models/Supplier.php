<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "suppliers";
    protected $fillable = ['id', 'name','email', 'address','phone','photo','created_at','updated_at'];
}
