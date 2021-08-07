<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "suppliers";
    protected $fillable = ['id', 'shop_name','email', 'address','phone','photo','created_at','updated_at'];

    public function product(){
        return $this -> hasMany(Product::class,'supplier_id','id');
    }
}
