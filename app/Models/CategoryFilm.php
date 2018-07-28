<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryFilm extends Model
{
    protected $table = 'category_film';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'film_id'
    ];

    /**
     * Get category film detail of category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    /**
     * Get film detail of category film.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function film()
    {
        return $this->belongsTo('App\Models\Film', 'film_id', 'id');
    }
}
