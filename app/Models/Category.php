<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

     /**
     * Get many category film detail of film.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function films()
    {
        return $this->belongsToMany('App\Models\Film', 'category_film', 'category_id', 'film_id')->withTimestamps();
    }

    /**
     * Get category film detail of category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function categoryFilms()
    {
        return $this->hasMany('App\Models\CategoryFilm', 'category_id', 'id');
    }
}
