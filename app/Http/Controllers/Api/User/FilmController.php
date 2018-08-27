<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Response;
use App\Models\Film;
use App\Models\Category;

class FilmController extends ApiController
{
    const TICKET_PRICE = 60000;
    const IMAGE_PATH = "images/default/default.jpg";
   
    /**
     * Display the specified resource.
     *
     * @param \App\Models\Film $film show detail film
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        $categories = Category::all();
        $categoryIds = $film->cateroryFilms->pluck('category_id')->toArray();
        $categoryFilm = [];
        foreach ($categories as $category) {
            if (in_array($category->id, $categoryIds)) {
                array_push($categoryFilm, $category->name);
            }
        }
        $film['categories'] = implode(", ", $categoryFilm);
        $film['image_path'] = empty($film['images'][0]) ? self::IMAGE_PATH : $film['images'][0]['path'];
        $film['price_formated'] = empty($film['schedules'][0]['tickets'][0]) ? number_format(self::TICKET_PRICE) : number_format($film['schedules'][0]['tickets'][0]['price']);
        $film->images;
        return $this->showOne($film, Response::HTTP_OK);
    }

     /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $films = Film::filter($request)->with(['images', 'schedules.tickets' => function ($query) {
            $query->orderBy('price', config('define.dir_desc'));
        }])->whereIn('id', function ($query) {
            $query->select('film_id')
                  ->from('schedules');
        })->orderBy('id', config('define.dir_desc'))->paginate(config('define.film.limit_rows'));

        foreach ($films as $film) {
            $film['image_path'] = empty($film['images'][0]) ? self::IMAGE_PATH : $film['images'][0]['path'];
            $film['price_formated'] = empty($film['schedules'][0]['tickets'][0]) ? number_format(self::TICKET_PRICE) : number_format($film['schedules'][0]['tickets'][0]['price']);
        }
        $films = $this->formatPaginate($films);
        return $this->showAll($films, Response::HTTP_OK);
    }
}
