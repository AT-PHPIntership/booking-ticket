<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Schedule;
use App\Models\BookingDetail;
use App\Models\Booking;
use Symfony\Component\Config\Definition\Exception\Exception;
use App\Models\Ticket;

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
            'films.name as fname',
            DB::raw('COUNT(booking_details.seat_id) as numSeatBooked')
        ];

        $schedules = DB::table('schedules')
            ->join('films', 'schedules.film_id', 'films.id')
            ->join('rooms', 'schedules.room_id', 'rooms.id')
            ->join('tickets', 'schedules.id', 'tickets.schedule_id')
            ->join('booking_details', 'tickets.id', 'booking_details.ticket_id')
            ->select($getField)
            ->where('films.deleted_at', null)
            ->where('schedules.deleted_at', null)
            ->groupBy('schedule_id')
            ->orderBy('schedules.id')
            ->paginate(config('define.schedule.limit_rows'));

        return view('admin.pages.schedules.index', compact('schedules'));
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
