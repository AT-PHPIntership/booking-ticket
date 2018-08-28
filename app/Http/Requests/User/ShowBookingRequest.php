<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use DB;

class ShowBookingRequest extends FormRequest
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
        $column = DB::select('show columns from booking_details');
        $orderby = array_column($column, 'Field');
        $sortby = [
            config('define.dir_asc'),
            config('define.dir_desc')
        ];

        return [
            'sortby' => 'in:'. implode(",", $sortby),
            'orderby' => 'in:'. implode(",", $orderby),
            'perpage' => 'integer|min:1'
        ];
    }
}
