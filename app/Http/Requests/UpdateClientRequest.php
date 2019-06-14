<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'firstname'    => 'required|min:3',
            'lastname'     => 'required|min:3',
            //'email' => 'required|string|email|max:255|unique:users,email,'.,
        ];
    }
       
    public function messages()
    {
        return [
            'firstname.required' => 'The First Name is required',
            'firstname.min' => 'The First Name should be minimum 3 characters',
            'lastname.required' => 'The Last Name is required',
            'lastname.min' => 'The Last Name should be minimum 3 characters',
        ];
    }
}
