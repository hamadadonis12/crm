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
            'client_id' => 'required'
        ];
    }
	   
	public function messages()
    {
        return [
            'name.required' => 'The package name field is required',
            'name.min' => 'The package name Field should be minimum 3 characters',
            'client_id.required' => 'The client field is required'
        ];
    }
}
