<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditFilmRequest extends FormRequest
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
            'name' => 'required|max:255',
            'actor' => 'max:255',
            'producer' => 'max:255',
            'director' => 'max:255',
            'duration' => 'required|integer|min:20|max:300',
            'describe' => 'max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'categories' => 'required',
            'categories.*' => 'required',
            'photos.*' => 'image|mimes:jpg,png,jpeg|max:2048',
            'country' => 'max:255'
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
            'name.required' => trans('film.admin.add.message.require_name'),
            'categories.required' => trans('film.admin.add.message.require_category'),
            'actor.required' => trans('film.admin.add.message.require_actor'),
            'producer.required' => trans('film.admin.add.message.require_producer'),
            'director.required' => trans('film.admin.add.message.require_director'),
            'duration.required' => trans('film.admin.add.message.require_duration'),
            'describe.required' => trans('film.admin.add.message.require_describe'),
            'start_date.required' => trans('film.admin.add.message.require_start_date'),
            'end_date.required' => trans('film.admin.add.message.require_end_date'),
            'photos.max' => trans('film.admin.add.message.size_image'),
            'country.required' => trans('film.admin.add.message.require_country')
        ];
    }
}
