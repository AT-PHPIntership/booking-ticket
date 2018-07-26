<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingDetail extends Model
{
    protected $table = 'booking_detail';
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'booking_id', 'ticket_id', 'seat_id'
    ];

    /**
     * Get the bookings for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function booking()
    {
        return $this->belongsTo('App\Models\Booking', 'booking_id', 'id');
    }

    /**
     * Get ticket detail of booking detail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function ticket()
    {
        return $this->belongsTo('App\Models\Ticket', 'ticket_id', 'id');
    }

    /**
     * Get seat of booking detail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function seat()
    {
        return $this->belongsTo('App\Models\Seat', 'seat_id', 'id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
