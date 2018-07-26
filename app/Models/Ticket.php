<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price', 'schedule_id', 'type'
    ];

    /**
     * Get schedule of ticket.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function schedule()
    {
        return $this->belongsTo('App\Models\Schedule', 'schedule_id', 'id');
    }

    /**
     * Get booking detail of ticket.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function bookingDetails()
    {
        return $this->hasMany('App\Models\BookingDetail', 'ticket_id', 'id');
    }

}
