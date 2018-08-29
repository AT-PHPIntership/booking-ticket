<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use DB;
use App\Models\Schedule;
use App\Http\Requests\CreateTicketRequest;
use App\Http\Requests\EditTicketRequest;

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
            'schedules.start_time as time',
            'films.name as film_name',
        ];

        $tickets = DB::table('tickets')
                ->join('schedules', 'schedules.id', 'tickets.schedule_id')
                ->join('films', 'schedules.film_id', 'films.id')
                ->select($getField)
                ->where('films.deleted_at', null)
                ->where('schedules.deleted_at', null)
                ->where('tickets.deleted_at', null)
                ->orderBy('tickets.id', config('define.dir_desc'))
                ->paginate(config('define.ticket.limit_rows'));
        return view('admin.pages.tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schedules = Schedule::all();
        return view('admin.pages.tickets.create', compact('schedules'));
    }

    /**
     * Show the film for creating a new ticket.
     *
     *@param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function getFilm($id)
    {
        $film = Schedule::find($id)->film;
        return response()->json($film->name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request Request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTicketRequest $request)
    {
        try {
            $ticket = new Ticket;
            $schedule = Schedule::findOrFail($request->schedule_id);
            $tickets = $schedule->tickets->pluck('type')->toArray();
            if (in_array($request->type, $tickets)) {
                return redirect()->route('admin.tickets.create')
                                ->with('message', trans('ticket.admin.message.valid_type'));
            }
            $ticket->type = $request->type;
            $ticket->price = $request->price;
            $ticket->schedule_id = $request->schedule_id;
            $ticket->save();
            return redirect()->route('admin.tickets.index')
                             ->with('message', trans('ticket.admin.message.add'));
        } catch (Exception $e) {
            return redirect()->route('admin.tickets.create')
                             ->with('message', trans('ticket.admin.message.add_fail'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ticket $ticket Ticket
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        try {
            $schedules = Schedule::all();
            return view('admin.pages.tickets.edit', compact('schedules', 'ticket'));
        } catch (Exception $e) {
            return redirect()->route('admin.tickets.index')
                             ->with('message', trans('ticket.admin.message.edit_fail'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request Request
     * @param Ticket                   $ticket  ticket
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EditTicketRequest $request, Ticket $ticket)
    {
        try {
            $schedule = Schedule::findOrFail($ticket->schedule_id);
            $tickets = $schedule->tickets->pluck('type')->toArray();
            if (in_array($request->type, $tickets)) {
                return redirect()->route('admin.tickets.index')
                                ->with('err', trans('ticket.admin.message.valid_type'));
            }
            $ticket->type = $request->type;
            $ticket->price = $request->price;
            $ticket->save();
            return redirect()->route('admin.tickets.index')
                             ->with('message', trans('ticket.admin.message.edit'));
        } catch (Exception $e) {
            return redirect()->route('admin.tickets.index')
                             ->with('message', trans('ticket.admin.message.edit_fail'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ticket $ticket Ticket
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        DB::beginTransaction();
        try {
            foreach ($ticket->bookingDetails() as $bookingDetail) {
                $bookingDetail->delete();
            }
            $ticket->delete();
            DB::commit();
            return redirect()->back()->with('message', trans('ticket.admin.message.del'));
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('message', trans('ticket.admin.message.del_fail'));
        }
    }
}
