<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        return [
            'full_name' => 'max:255',
            'email' => 'email|unique:users,email,' . $this->user->id,
            'password' => 'min:8',
            'phone' => 'regex:/^[0-9]{10,12}$/',
        ];
    }

    /**
     * Custom message error for rules
     *
     * @return void
     */
    public function messages()
    {
        return [
            'password.min' => trans('user.admin.add.message.max_password'),
            'email.unique' => trans('user.admin.add.message.unique_email'),
            'phone.regex' => trans('user.admin.add.message.add_invalid_phone'),
        ];
    }
}
