<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(){
        $cat = Category::all();
        return response()->json($cat);
    }

    public function store(CategoryRequest $request){

        Category::create([
            'name' => $request-> name,
        ]);

    }

    public function delete($id)
    {
        $Category = Category::where('id', $id)->first();
        $Category->delete();
    }

    public function edit($id){
        $cat = Category::where('id',$id)-> first();
        return response()->json($cat);

    }

    public function update($id, CategoryRequest $request){
        $cat = Category::where('id',$id)-> first();
        $cat-> update([
            'name' => $request-> name,
        ]);

    }
}
