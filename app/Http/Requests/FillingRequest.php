<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class FillingRequest extends FormRequest
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
              'available_for' => 'required'
        ];
        if ($request->method() !== 'PUT') {
            $rules['background'] = 'required';
            $rules['thumb'] = 'required';
        }
        return $rules;
    }

    public function messages() {
        return [
            'name.required' => 'Name is required.',
            'background.required' => 'Background of filling image is required.',
            'thumb.required' => 'Thumbnail of filling image is required.',
            'available_for.required' => 'Check at least one item.',
        ];
    }
}
