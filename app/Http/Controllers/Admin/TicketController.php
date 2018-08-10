<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getField = [
            'tickets.id as id',
            'tickets.type as type',
            'tickets.price as price',
            'tickets.schedule_id as schedule_id',
            'films.name as film_name',
        ];

        $tickets = DB::table('tickets')
                ->join('schedules', 'schedules.id', 'tickets.schedule_id')
                ->join('films', 'schedules.film_id', 'films.id')
                ->select($getField)
                ->where('films.deleted_at', null)
                ->where('schedules.deleted_at', null)
                ->where('tickets.deleted_at', null)
                ->orderBy('schedules.id', config('define.dir_desc'))
                ->paginate(config('define.ticket.limit_rows'));
        return view('admin.pages.tickets.index', compact('tickets'));
    }
}
