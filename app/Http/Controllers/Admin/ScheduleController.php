<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use App\Models\Schedule;
use App\Models\Film;
use App\Models\Room;
use App\Http\Requests\CreateScheduleRequest;

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

    /**
     * This function return view when create schedule
     *
     * @return void
     */
    public function create()
    {
        $data['films'] = Film::where('end_date', '>=', now())->get();
        $data['rooms'] = Room::all();
        return view('admin.pages.schedules.create', $data);
    }

    /**
     * This function store schedule
     *
     * @param CreateScheduleRequest $request request
     *
     * @return void
     */
    public function store(CreateScheduleRequest $request)
    {
        $startSchedule = new Carbon($request->starttime);
        $endSchedule = new Carbon($request->endtime);
        $film = Film::find($request->film);

        // if set time when film not release or out of date
        if ($startSchedule < $film->start_date || $endSchedule > $film->end_date) {
            return redirect()->back()
                        ->with('message', trans('schedule.admin.message.invalid_time_film') . 
                        $film->start_date . trans('schedule.admin.message.and') . $film->end_date);
        } else {
            
            // if set time between start or end time of another schedule 
            $scheduleValids = Schedule::where('schedules.room_id', $request->room)->get();
            foreach ($scheduleValids as $scheduleValid) {
                $scheduleValidStartTime = $scheduleValid->start_time;
                $scheduleValidEndTime = $scheduleValid->end_time;

                if (($startSchedule >= $scheduleValidStartTime && $startSchedule <= $scheduleValidEndTime)
                    || ($endSchedule >= $scheduleValidStartTime && $endSchedule <= $scheduleValidEndTime)
                    ) {
                        return redirect()->back()->with('message', trans('schedule.admin.message.room_invalid'));
                    }
            }

            // insert schedule to databases
            $data = [
                'film_id' => $request->film,
                'room_id' => $request->room,
                'start_time' => $startSchedule,
                'end_time' => $endSchedule
            ];
            Schedule::create($data);
            return redirect()->route('admin.schedules.index')->with('message', trans('schedule.admin.message.add'));
        }
    }

    /**
     * Destroy schedule in admin dasboard
     *
     * @param Schedule $schedule schedule
     *
     * @return void
     */
    public function destroy(Schedule $schedule)
    {
        DB::beginTransaction();
        try {
            $bookingDetails = BookingDetail::with('ticket.schedule')
                ->whereIn('ticket_id', $schedule->tickets()->get(['tickets.id']))
                ->get();
            foreach ($bookingDetails as $bookingDetail) {
                $bookingDetail->delete();
            }
            $schedule->tickets()->delete();
            $schedule->delete();
            DB::commit();
            return redirect()->back()->with('message', 'Delete successfully');
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('message', 'Delete failed');
        }
    }
}
