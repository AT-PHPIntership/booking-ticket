<?php
namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryFilm;

trait FilterTrait
{
    /**
     * Filter with request data
     *
     * @param \Illuminate\Database\Eloquent\Builder|static $query   query
     * @param \Illuminate\Http\Request                     $request request
     *
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public static function scopeFilter($query, Request $request)
    {
        return static::where(function ($query) use ($request) {
            if ($request->category) {
                $query->whereIn('id', function ($query) use ($request) {
                    $query->select('film_id')
                          ->from('category_film')
                          ->where('category_id', $request->category);
                });
            }
            if ($request->name) {
                $query->where('name', 'like', '%'.$request->name.'%');
            }
        });
    }
}
