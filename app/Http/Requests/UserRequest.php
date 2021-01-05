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
        return [
            'first_name' => 'sometimes|alpha|max:50',
            'middle_name' => 'sometimes|alpha|max:50',
            'last_name' => 'sometimes|alpha|max:50',
            'email' => 'sometimes|email|unique:users',
            'password' => 'sometimes',
            'avatar' => 'sometimes|image'
        ];
    }
}
