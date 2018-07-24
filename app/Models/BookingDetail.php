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
        'booking_id', 'quantity', 'schedule_id', 'price', 'seat_id'
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
     * Get schedule detail of booking detail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function schedule()
    {
        return $this->belongsTo('App\Models\Schedule', 'schedule_id', 'id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
