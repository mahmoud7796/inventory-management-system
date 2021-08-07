<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ['id', 'name','created_at','updated_at'];

    public function product(){
        return $this -> hasMany(Product::class,'category_id','id');
    }
}
