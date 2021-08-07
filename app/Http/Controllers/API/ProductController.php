<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Traits\General;

class ProductController extends Controller
{
    use General;
    public function index(){
        $pro = Product::with(['supplier' => function($q){
            return $q -> select('id','shop_name');
        }])
            ->with(['category' => function($q){
                return $q -> select('id','name');
            }])->get();
        return response()->json($pro);
    }

    public function store(ProductRequest $request){

        $photo = $this ->SaveImage($request->image,'/backend/product/',200,200);
        Product::create([
            'name' => $request-> name,
            'category_id' => $request-> category_id,
            'supplier_id' =>$request-> supplier_id,
            'code' => $request-> code,
            'buy' => $request-> buy,
            'root' => $request-> root,
            'sell' => $request-> sell,
            'buy_date' => $request-> buy_date,
            'quantity' => $request-> quantity,
            'image' =>  $photo
        ]);

    }

    public function delete($id)
    {
        $product = Product::where('id', $id)->first();
        $photo = $product->image;
        $img = public_path().$photo;
        if ($photo) {
            unlink($img);
        }
        $product->delete();
    }

    public function edit($id){
        $pro = Product::where('id',$id)-> first();
        return response()->json($pro);

    }

    public function update($id, ProductRequest $request){
        $pro = Product::where('id',$id)-> first();
        if($request -> has('newPhoto')){
            $photo = $this ->SaveImage($request->newPhoto,'/backend/product/',200,200);
            unlink(public_path().$pro->image);
            $pro-> update([
                'image' =>  $photo,
            ]);
        }
        $pro-> update([
            'name' => $request-> name,
            'category_id' => $request-> category_id,
            'supplier_id' =>$request-> supplier_id,
            'code' => $request-> code,
            'buy' => $request-> buy,
            'root' => $request-> root,
            'sell' => $request-> sell,
            'buy_date' => $request-> buy_date,
            'quantity' => $request-> quantity,
        ]);

    }
}
