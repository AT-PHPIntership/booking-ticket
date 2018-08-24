<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use DB;

class GetUserBookingRequest extends FormRequest
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
        $sortBy = array_column($column, 'Field');
        $orderBy = [
            config('define.dir_asc'),
            config('define.dir_desc')
        ];

        return [
            'sortBy' => 'in:'. implode(",", $sortBy),
            'orderBy' => 'in:'. implode(",", $orderBy),
            'perpage' => 'integer|min:1'
        ];
    }
}
