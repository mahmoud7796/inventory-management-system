<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required',
            'supplier_id' => 'required',
            'code' => 'required|string|max:100',
            'buy' => 'required|string|max:100',
            'sell' => 'required|string|max:100',
            'buy_date' => 'required|string|max:100',
            'quantity' => 'required|string|max:100',
            'root' => 'required|string|max:100',
            'image' => 'required',

        ];
    }
}
