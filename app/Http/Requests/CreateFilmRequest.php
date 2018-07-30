<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFilmRequest extends FormRequest
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
            'name' => 'required|max:255|unique:films,name',
            'actor' => 'required|string',
            'producer' => 'required|max:100',
            'director' => 'required|string',
            'duration' => 'required|integer|min:90|max:180',
            'describe' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:1000',
            'country' => 'required|string'
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
            'name.required' => trans('film.admin.add.message.msg_require_name'),
            'name.unique' => trans('film.admin.add.message.msg_unique_name'),
            'actor.required' => trans('film.admin.add.message.msg_require_actor'),
            'producer.required' => trans('film.admin.add.message.msg_require_producer'),
            'director.required' => trans('film.admin.add.message.msg_require_director'),
            'duration.required' => trans('film.admin.add.message.msg_require_duration'),
            'describe.required' => trans('film.admin.add.message.msg_require_describe'),
            'image.required' => trans('film.admin.add.message.msg_require_image'),
            'image.max' => trans('film.admin.add.message.msg_size_image'),
            'country.required' => trans('film.admin.add.message.msg_require_country')
        ];
    }
}
