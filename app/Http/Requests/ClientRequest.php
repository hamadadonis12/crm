<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'firstname' 	=> 'required|min:3',
			'lastname' 		=> 'required|min:3',
			'email' 		=> 'required|string|email|max:255|unique:clients,email',
        ];
    }
	   
	public function messages()
    {
        return [
            'firstname.required' => 'The First Name field is required',
            'firstname.min' => 'The First Name Field should be minimum 3 characters',
			'lastname.required' => 'The Last Name field is required',
            'lastname.min' => 'The Last Name Field should be minimum 3 characters',
        ];
    }
}
