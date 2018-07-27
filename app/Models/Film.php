<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Film extends Model
{
    use SoftDeletes;
    protected $table = 'films';

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
        'name', 'actor', 'producer', 'director', 'duration', 'describe', 'country'
    ];

    /**
     * Get category film detail of film.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function cateroryFilms()
    {
        return $this->hasMany('App\Models\CategoryFilm', 'film_id', 'id');
    }

    /**
     * Get images of film.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function images()
    {
        return $this->hasMany('App\Models\Image', 'film_id', 'id');
    }

    /**
     * Get category film detail of film.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function schedules()
    {
        return $this->hasMany('App\Models\Schedule', 'film_id', 'id');
    }

     /**
     * Get comment film detail of film.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'film_id', 'id');
    }

     /**
     * Get rating film detail of film.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function ratings()
    {
        return $this->hasMany('App\Models\Rating', 'film_id', 'id');
    }
}
