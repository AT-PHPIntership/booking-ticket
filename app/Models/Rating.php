<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'film_id', 'rate'
    ];

    /**
     * Get user detail of rating.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    /**
     * Get film detail of rating.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function film()
    {
        return $this->belongsTo('App\Models\Film', 'film_id', 'id');
    }
}
