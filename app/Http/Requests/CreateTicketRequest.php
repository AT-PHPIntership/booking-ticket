<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTicketRequest extends FormRequest
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
            'fiml' => 'exists:films,id',
            'schedule' => 'exists:schedules,id',
            'type' => 'min:2|max:20',
            'price' => 'required|numeric'
        ];
    }
}
