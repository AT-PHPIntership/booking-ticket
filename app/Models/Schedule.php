<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;
    protected $table = 'schedules';

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
        'room_id', 'film_id', 'start_time', 'end_time'
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
     * Get ticket of schedule.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket', 'schedule_id', 'id');
    }
}
