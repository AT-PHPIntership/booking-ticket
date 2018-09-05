<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Collection;
use App\Models\Schedule;
use DB;

class ScheduleController extends ApiController
{

    /**
     * Get total seat and booked seat in schedule
     *
     * @param Schedule $schedule schedule
     *
     * @return void
     */
    public function getSeat(Schedule $schedule)
    {
        $bookedField = [
            'seat_id',
            'schedules.id as schedule_id'
        ];
        $totalField = [
            'seats.id as seat_id',
            'seats.name as seat_name',
            'schedules.id as schedule_id'
        ];

        $bookedSeats = DB::table('booking_details')
            ->join('tickets', 'booking_details.ticket_id', 'tickets.id')
            ->join('schedules', 'tickets.schedule_id', 'schedules.id')
            ->select($bookedField)
            ->distinct()
            ->where('schedules.id', $schedule->id)
            ->orderBy('seat_id')
            ->get();

        $totalSeats = DB::table('schedules')
            ->join('rooms', 'schedules.room_id', 'rooms.id')
            ->join('seats', 'rooms.id', 'seats.room_id')
            ->select($totalField)
            ->distinct()
            ->where('schedules.id', $schedule->id)
            ->orderBy('seat_id')
            ->get();

        $data['booked'] = $bookedSeats;
        $data['totalSeats'] = $totalSeats;

        return $this->showAll(collect($data));
    }
}
