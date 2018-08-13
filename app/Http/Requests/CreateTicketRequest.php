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
            'type' => 'required|max:100',
            'schedule_id' => 'required',
            'price' => 'required|integer|min:0',
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
            'type.required' => trans('ticket.admin.add.message.require_name'),
            'price.required' => trans('ticket.admin.add.message.require_price'),
            'price.integer' => trans('ticket.admin.add.message.valid_price'),
        ];
    }
}
