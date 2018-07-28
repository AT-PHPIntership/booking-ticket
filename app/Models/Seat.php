<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $table = 'seats';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'room_id', 'name', 'status'
    ];

    /**
     * Get room detail of schedule.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'room_id', 'id');
    }

    /**
     * Get booking detail of seat.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function bookingDetails()
    {
        return $this->hasMany('App\Models\BookingDetail', 'seat_id', 'id');
    }
}
