<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getField = [
            'schedules.id as id',
            'rooms.status',
            'rooms.name as name',
            'schedules.start_time',
            'schedules.end_time',
            'films.name as film_name',
        ];

        $schedules = DB::table('schedules')
                ->join('films', 'schedules.film_id', 'films.id')
                ->join('rooms', 'schedules.room_id', 'rooms.id')
                ->select($getField)
                ->where('films.deleted_at', null)
                ->where('schedules.deleted_at', null)
                ->orderBy('schedules.id')
                ->paginate(config('define.schedule.limit_rows'));

        return view('admin.pages.schedules.index', compact('schedules'));
    }
}
