<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            'name' 	=> 'required|min:3',
        ];
    }
	   
	public function messages()
    {
        return [
            'name.required' => 'The Package Name field is required',
            'name.min' => 'The Package Name Field should be minimum 3 characters',
        ];
    }
}
