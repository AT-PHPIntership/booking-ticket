<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    protected $table = 'schedules';
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'room_id', 'film_id', 'datetime'
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
     * Get film detail of schedule.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function film()
    {
        return $this->belongsTo('App\Models\Film', 'film_id', 'id');
    }

    /**
     * Get booking detail of schedule.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function bookingDetails()
    {
        return $this->hasMany('App\Models\BookingDetail', 'schedule_id', 'id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
