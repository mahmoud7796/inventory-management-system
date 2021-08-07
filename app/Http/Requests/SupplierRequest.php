<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'shop_name' => 'required|string|max:100',
            'email' => 'required|string|max:100|email|unique:employees,email,'.$this->id,
            'address' => 'required|string|max:200',
            'phone' => 'required|string|max:50',
            'photo' => 'required',
        ];
    }
}
