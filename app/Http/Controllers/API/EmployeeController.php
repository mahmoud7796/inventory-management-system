<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Traits\General;
use Image;

class EmployeeController extends Controller
{
    use General;
    public function index(){
        $emp = Employee::all();
        return response()->json($emp);
    }

    public function store(EmployeeRequest $request){
//save Image
    $photo = $this ->SaveImage($request->photo,'/backend/employee/',200,200);

        Employee::create([
            'name' => $request-> name,
            'email' => $request-> email,
            'phone' => $request-> phone,
            'nid' => $request-> nid,
            'address' => $request-> address,
            'date' => $request-> date,
            'salary' => $request-> salary,
            'photo' =>  $photo
        ]);

    }

    public function delete($id)
    {
        $employee = Employee::where('id', $id)->first();
        $photo = $employee->photo;
        $img = public_path().$photo;
        if ($photo) {
            unlink($img);
        }
        $employee->delete();
    }

    public function edit($id){
        $emp = Employee::where('id',$id)-> first();
        return response()->json($emp);

    }

    public function update($id, EmployeeRequest $request){
        $emp = Employee::where('id',$id)-> first();
        if($request -> has('newPhoto')){
            $photo = $this ->SaveImage($request->newPhoto,'/backend/employee/',200,200);
            unlink(public_path().$emp->photo);
            $emp-> update([
                'photo' =>  $photo,
            ]);
        }
            $emp-> update([
                'name' => $request-> name,
                'email' => $request-> email,
                'phone' => $request-> phone,
                'nid' => $request-> nid,
                'address' => $request-> address,
                'date' => $request-> date,
                'salary' => $request-> salary,
            ]);

    }
}
