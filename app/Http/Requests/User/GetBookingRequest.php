<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use DB;

class GetBookingRequest extends FormRequest
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
        $column = DB::select('show columns from bookings');
        $orderBy = array_column($column, 'Field');
        $sortBy = [
            config('define.dir_asc'),
            config('define.dir_desc')
        ];

        return [
            'sortby' => 'in:'. implode(",", $sortBy),
            'orderby' => 'in:'. implode(",", $orderBy),
            'perpage' => 'integer|min:1'
        ];
    }
}
