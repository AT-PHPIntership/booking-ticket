<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use App\Models\Ticket;
use App\Models\BookingDetail;
use App\Models\Schedule;
use Illuminate\Support\Collection;
use DB;

class SeatController extends ApiController
{
    public function getRoomSeats()
    {
        // $totalSeats = Schedule::where('id', 1)->with(['room' => function ($query) {
        //     $query->select('id');
        // },'room.seats:id,room_id,name,status'])->select('id', 'room_id', 'start_time', 'end_time')->get();

        $totalSeats = DB::table('schedules')
            ->join('rooms', 'schedules.room_id', 'rooms.id')
            ->join('seats', 'rooms.id', 'seats.room_id')
            ->select(['schedules.id as id', 'seats.id as seat_id'])
            ->where('schedules.id', 7)
            ->get();

        // $data = collect(json_decode($bookedSeats))->merge(json_decode($totalSeats));
        return $this->showAll(collect($totalSeats));
    }

    public function getRoomSeatBooked()
    {
        // $bookedSeats = Schedule::where('id', 1)->with(['tickets' => function ($query) {
        //     $query->select('id', 'schedule_id');
        // },
        // 'tickets.bookingDetails:ticket_id,seat_id'])->select('id')->get();

        $bookedSeats = DB::table('booking_details')
            ->join('tickets', 'booking_details.ticket_id', 'tickets.id')
            ->join('schedules', 'tickets.schedule_id', 'schedules.id')
            ->select(['booking_details.seat_id', 'schedules.id'])
            ->where('schedules.id', 7)
            ->get();
        return $this->showAll(collect($bookedSeats));
    }
}
