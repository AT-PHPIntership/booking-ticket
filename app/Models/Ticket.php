<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;
    protected $table = 'tickets';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
