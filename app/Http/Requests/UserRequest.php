<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch ($this->method())
        {
            case 'POST':
                return [
                    'name' => 'required|alpha_num|max:30',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6|confirmed',
                    'role' => 'required|exists:roles,id'
                ];
                break;

            case 'PUT':
            case 'PATCH':
                return [
                    'name' => 'required|alpha_num|max:30',
                    'email' => 'required|email|max:255|unique:users,'.$this->user->id,
                    'password' => 'min:6|confirmed',
                    'role' => 'required|exists:roles,id',
                ];
                break;
        }
    }
}
