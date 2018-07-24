<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'film_id', 'path'
    ];

    /**
     * Get category film detail of film.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function film()
    {
        return $this->belongsTo('App\Models\Film', 'film_id', 'id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
