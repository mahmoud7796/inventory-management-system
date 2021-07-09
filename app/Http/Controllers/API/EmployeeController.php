<?php

namespace App\Http\Controllers\API;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $emp = Employee::get();
        return response()->json($emp);
    }
    public function create(){

    }
    public function edit(){

    }
    public function store(){

    }
}
