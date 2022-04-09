<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class InventoryRequest extends FormRequest
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
    public function rules(Request $request) {
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'width' => 'required',
            'height' => 'required',
            'depth' => 'required',
            'product_code' => 'required',
            'category_id' => 'required',
        ];
        if ($request->method() !== 'PUT') {
            $rules['thumb'] = 'required';
            $rules['front'] = 'required';
            $rules['top'] = 'required';
        }
        return $rules;
    }
}
