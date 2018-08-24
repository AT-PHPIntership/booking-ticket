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
use App\Http\Requests\User\UserBookingRequest;
use App\Http\Requests\User\GetUserBookingRequest;
use App\Http\Requests\User\GetUserDetailBookingRequest;

class BookingController extends ApiController
{
    /**
     * Get user history booking
     *
     * @param GetUserBookingRequest $request request
     *
     * @return void
     */
    public function getUserBooking(GetUserBookingRequest $request)
    {
        $rowPerPage = empty($request['perpage']) ? config('define.limit_rows') : $request['perpage'];
        $user = Auth::user();
        
        $data = Booking::with(['bookingDetails.ticket.schedule.film'])
        ->where('user_id', $user->id)
        ->when(request('sortBy'), function ($query) {
            return $query->when(request('orderBy'), function ($query) {
                return $query->orderBy(request('sortBy'), request('orderBy'));
            });
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
    public function getUserDetailBooking(Booking $booking, GetUserDetailBookingRequest $request)
    {
        $rowPerPage = empty($request['perpage']) ? config('define.limit_rows') : $request['perpage'];
        $data = BookingDetail::with(['ticket.schedule.film', 'seat.room'])
            ->where('booking_id', $booking->id)
            ->when(request('sortBy'), function ($query) {
                return $query->when(request('orderBy'), function ($query) {
                    return $query->orderBy(request('sortBy'), request('orderBy'));
                });
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
    public function userBooking(UserBookingRequest $request)
    {
        $user = Auth::user();
        $seats = $request['seats'];

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
