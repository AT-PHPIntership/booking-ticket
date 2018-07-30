<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'name' => 'required|unique:categories,name|max:255',
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
            'name.required' => trans('category.admin.add.message.msg_require_name'),
            'name.unique' => trans('category.admin.add.message.msg_unique_name'),
            'name.max' => trans('category.admin.add.message.msg_size_name'),
        ];
    }
}
