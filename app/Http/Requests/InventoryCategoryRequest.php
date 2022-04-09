<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class InventoryCategoryRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];
        if ($request->method() !== 'PUT') {
            $rules['type'] = 'required';
            $rules['thumb'] = 'required';
        }
        return $rules;
    }

    public function messages() {
        return [
            'name.required' => 'Name is required.',
            'type.required' => 'Select a type of inventory.',
            'thumb.required' => 'Thumbnail of category is required.',
        ];
    }
}
