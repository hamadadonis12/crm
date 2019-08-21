<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            'code' 			=> 'required|min:3|max:3',
			'name' 			=> 'required|min:3',
        ];
    }
	   
	public function messages()
    {
        return [
            'code.required' => 'The Code Name field is required',
            'code.min' => 'The Code Field should be 3 characters',
			'name.required' => 'The Country Name field is required',
            'name.min' => 'The Country Name Field should be minimum 3 characters',
        ];
    }
}
