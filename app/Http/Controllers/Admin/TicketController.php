<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Schedule;
use App\Models\Film;
use DB;
use App\Http\Requests\CreateTicketRequest;

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

    /**
     * This function return view for create ticket
     *
     * @return void
     */
    public function create()
    {
        $datas['films'] = Film::where('end_date', '>=', now())
            ->where('start_date', '<=', now())->get();
        return view('admin.pages.tickets.create', $datas);
    }

    /**
     * This functino check and save ticket
     *
     * @param CreateTicketRequest $request request
     *
     * @return void
     */
    public function store(CreateTicketRequest $request)
    {
        if ($request->film) {
            $datas['schedules'] = Schedule::with('room')
                ->where('film_id', $request->film)
                ->where('start_time', '>=', now())->get();
            return view('admin.pages.tickets.create', $datas);
        }

        $datas = [
            'schedule_id' => $request->schedule,
            'type' => $request->type,
            'price' => $request->price
        ];
        Ticket::create($datas);
        return redirect()->route('admin.tickets.index')
            ->with('message', trans('schedule.admin.message.add'));
    }
}
