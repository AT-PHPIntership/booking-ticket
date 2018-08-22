<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
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
        $id = Auth::user()->id;
        
        return [
            'full_name' => 'max:255',
            'email' => 'email|unique:users,email,'. $id,
            'password' => 'min:8',
            'phone' => 'regex:/^[0-9]{10,12}$/',
        ];
    }
}
