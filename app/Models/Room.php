<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'status'
    ];

    /**
     * Get room detail of schedule.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function schedule()
    {
        return $this->belongsTo('App\Models\Schedule', 'room_id', 'id');
    }

    /**
     * Get seats detail of room.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function seats()
    {
        return $this->hasMany('App\Models\Seat', 'room_id', 'id');
    }
}
