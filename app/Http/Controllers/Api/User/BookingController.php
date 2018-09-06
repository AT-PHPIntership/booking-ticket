<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\User\CreateBookingRequest;
use App\Http\Requests\User\ShowBookingRequest;
use App\Http\Requests\User\GetBookingRequest;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\BookingDetail;
use App\Jobs\SendMailJob;
use App\Models\Schedule;
use App\Models\Booking;
use App\Models\Ticket;
use App\Models\Seat;
use App\Models\User;
use DB;

class BookingController extends ApiController
{
    /**
     * Get user history booking
     *
     * @param GetUserBookingRequest $request request
     *
     * @return void
     */
    public function index(GetBookingRequest $request)
    {
        $user = Auth::user();
        $rowPerPage = empty($request['perpage']) ? config('define.limit_rows') : $request['perpage'];
        $sortBy = empty($request['sortby']) ? config('define.dir_asc') : $request['sorby'];
        
        $data = Booking::with(['bookingDetails.ticket.schedule.film'])
            ->where('user_id', $user->id)
            ->when(request('orderby'), function ($query) use ($sortBy) {
                return $query->orderBy(request('orderby'), $sortBy);
            })->paginate($rowPerPage);

        $data = $this->formatPaginate($data);

        return $this->showAll($data);
    }

    /**
     * Get user history detail booking
     *
     * @param Booking                     $booking booking
     * @param GetUserDetailBookingRequest $request request
     *
     * @return void
     */
    public function show(Booking $booking, ShowBookingRequest $request)
    {
        $rowPerPage = empty($request['perpage']) ? config('define.limit_rows') : $request['perpage'];
        $sortBy = empty($request['sortby']) ? config('define.dir_asc') : $request['sortby'];

        $data = BookingDetail::with(['ticket.schedule.film', 'seat.room'])
            ->where('booking_id', $booking->id)
            ->when(request('orderby'), function ($query) use ($sortBy) {
                return $query->orderBy(request('orderby'), $sortBy);
            })->paginate($rowPerPage);
        
        $data = $this->formatPaginate($data);
        
        return $this->showAll($data);
    }

    /**
     * Get seat booked and total seat for function store
     *
     * @return void
     */
    public function getSeats()
    {
        $seatBooked = DB::table('schedules')
            ->join('tickets', 'schedules.id', 'tickets.schedule_id')
            ->join('booking_details', 'booking_details.ticket_id', 'tickets.id')
            ->where('schedules.id', Ticket::find(request('ticket_id'))->schedule_id)
            ->get()
            ->pluck('seat_id')
            ->toArray();
        $roomSeats = DB::table('schedules')
            ->join('rooms', 'schedules.room_id', 'rooms.id')
            ->join('seats', 'rooms.id', 'seats.room_id')
            ->where('schedules.id', Ticket::find(request('ticket_id'))->schedule_id)
            ->get()
            ->pluck('id')
            ->toArray();

        return [
            'seatBooked' => $seatBooked,
            'roomSeats' => $roomSeats
        ];
    }

    /**
     * Create booking for user
     *
     * @param UserBookingRequest $request request
     *
     * @return void
     */
    public function store(CreateBookingRequest $request)
    {
        $user = Auth::user();
        $seats = explode(",", $request['seats']);
        $seatCheck = $this->getSeats();

        DB::beginTransaction();
        try {
            $booking = Booking::create([
                'user_id' => $user->id
            ]);
            foreach ($seats as $seat) {
                if (!in_array($seat, $seatCheck['roomSeats']) || in_array($seat, $seatCheck['seatBooked'])) {
                    throw new ModelNotFoundException('Seat ' . $seat . ' have been taken or invalid');
                }
                BookingDetail::create([
                    'booking_id' => $booking->id,
                    'ticket_id' => $request['ticket_id'],
                    'seat_id' => $seat
                ]);
            }
            DB::commit();
            return $this->successResponse($booking, Response::HTTP_OK);
        } catch (\Exception $ex) {
            DB::rollback();
            return $this->errorResponse($ex->getMessage(), Response::HTTP_SERVICE_UNAVAILABLE);
        }
    }
}
