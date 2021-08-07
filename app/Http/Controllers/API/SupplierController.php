<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use App\Http\Controllers\Controller;
use App\Traits\General;
use Image;

class SupplierController extends Controller
{
    use General;
    public function index(){
        $sup = Supplier::all();
        return response()->json($sup);
    }

    public function store(SupplierRequest $request){
//save Image
    $photo = $this ->SaveImage($request->photo,'/backend/supplier/',200,200);

        Supplier::create([
            'shop_name' => $request-> shop_name,
            'email' => $request-> email,
            'phone' => $request-> phone,
            'address' => $request-> address,
            'photo' =>  $photo
        ]);

    }

    public function delete($id)
    {
        $Supplier = Supplier::where('id', $id)->first();
        $photo = $Supplier->photo;
        $img = public_path().$photo;
        if ($photo) {
            unlink($img);
        }
        $Supplier->delete();
    }

    public function edit($id){
        $sup = Supplier::where('id',$id)-> first();
        return response()->json($sup);

    }

    public function update($id, SupplierRequest $request){
        $sup = Supplier::where('id',$id)-> first();
        if($request -> has('newPhoto')){
            $photo = $this ->SaveImage($request->newPhoto,'/backend/Supplier/',200,200);
            unlink(public_path().$sup->photo);
            $sup-> update([
                'photo' =>  $photo,
            ]);
        }
        $sup -> update([
            'shop_name' => $request-> shop_name,
            'email' => $request-> email,
            'phone' => $request-> phone,
            'address' => $request-> address,
            ]);

    }
}
