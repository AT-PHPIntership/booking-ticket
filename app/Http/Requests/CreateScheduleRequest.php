<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateScheduleRequest extends FormRequest
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
            'film' => 'exists:films,id',
            'room' => 'exists:rooms,id',
            'starttime' => 'date_format:d-m-Y H:i|after:now()',
            'endtime' => 'date_format:d-m-Y H:i|after:starttime'
        ];
    }
}
