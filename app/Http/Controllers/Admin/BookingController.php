<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Ticket;
use App\Models\Schedule;
use App\Models\Film;
use DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getField = [
            'bookings.id as id',
            'users.full_name as name',
            'users.email as email',
            DB::raw('count(booking_details.id) as quantity'),
            DB::raw('sum(tickets.price) as price'),
        ];

        $bookings = DB::table('bookings')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->join('booking_details', 'bookings.id', '=', 'booking_details.booking_id')
            ->join('tickets', 'tickets.id', '=', 'booking_details.ticket_id')
            ->select($getField)
            ->where('bookings.deleted_at', null)
            ->groupBy('booking_details.booking_id')
            ->orderBy('id', config('define.dir_desc'))
            ->paginate(config('define.booking.limit_rows'));
        return view('admin.pages.bookings.index', compact('bookings'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id int
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getField = [
            'bookings.id as id',
            'users.full_name as name',
            'users.email as email',
            'films.name as film',
            'schedules.start_time as start',
            'schedules.end_time as end',
            'rooms.name as room',
            'seats.name as seat',
            DB::raw('sum(tickets.price) as price'),
        ];

        $bookings = DB::table('bookings')
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->join('booking_details', 'bookings.id', '=', 'booking_details.booking_id')
            ->join('seats', 'seats.id', '=', 'booking_details.seat_id')
            ->join('tickets', 'tickets.id', '=', 'booking_details.ticket_id')
            ->join('schedules', 'tickets.schedule_id', '=', 'schedules.id')
            ->join('films', 'films.id', '=', 'schedules.film_id')
            ->join('rooms', 'rooms.id', '=', 'schedules.room_id')
            ->select($getField)
            ->where('booking_details.booking_id', $id)
            ->where('bookings.deleted_at', null)
            ->where('booking_details.deleted_at', null)
            ->groupBy('booking_details.id')
            ->orderBy('id', config('define.dir_desc'))
            ->paginate(config('define.booking.limit_rows'));
            return view('admin.pages.bookings.show', compact('bookings'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id int
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $booking = Booking::findOrFail($id);
            $booking->bookingDetails()->delete();
            $booking->delete();
            DB::commit();
            return redirect()->route('admin.bookings.index')->with('message', trans('booking.admin.message.del'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.bookings.index')->with('message', trans('booking.admin.message.del_fail'));
        }
    }
}
