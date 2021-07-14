<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required_without:mail|string|max:100|email|unique:employees,email,'.$this->id,
            'address' => 'required|string|max:200',
            'phone' => 'required|string|max:50',
            'nid' => 'required|string|max:100',
            'salary' => 'required|string|max:100',
            'photo' => 'required',
            'date' => 'required',
        ];
    }
}
