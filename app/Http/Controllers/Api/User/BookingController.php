<?php

namespace App\Http\Controllers\Api\User;

use DB;
use App\Models\User;
use App\Models\Booking;
use App\Models\BookingDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\User\GetBookingRequest;
use App\Http\Requests\User\ShowBookingRequest;
use App\Http\Requests\User\CreateBookingRequest;

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
     * Create booking for user
     *
     * @param UserBookingRequest $request request
     *
     * @return void
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $seats = $request['seats'];
        $seats = explode(",", $seats);
        DB::beginTransaction();
        try {
            $booking = Booking::create([
                'user_id' => $user->id
            ]);
            foreach ($seats as $seat) {
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
            return $this->errorResponse(config('define.booking.store_resource_fail'), Response::HTTP_SERVICE_UNAVAILABLE);
        }
    }
}
