<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'required',
            'logo' => 'image',
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'name.required' => 'Tên trống',
    //         'description' => 'required',
    //         'logo' => 'image',
    //     ];
    // }
}
