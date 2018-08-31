<?php
namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Response;
use App\Models\Film;
use App\Models\Category;
use DB;

class FilmController extends ApiController
{
    /**
     * Display the specified resource.
     *
     * @param \App\Models\Film $film show detail film
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        $categoryFilms = $film->categories->pluck('name')->toArray();
        $film['categoryFilms'] = implode(", ", $categoryFilms);
        $film->images;
        $film['image_path'] = empty($film['images'][0]) ? config('define.film.image_default') : $film['images'][0]['path'];
        $film['price_formated'] = empty($film['schedules'][0]['tickets'][0]) ? number_format(config('define.film.price_ticket_default')) : number_format($film['schedules'][0]['tickets'][0]['price']);
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
            $film['image_path'] = empty($film['images'][0]) ? config('define.film.image_default') : $film['images'][0]['path'];
            $film['price_formated'] = empty($film['schedules'][0]['tickets'][0]) ? number_format(config('define.film.price_ticket_default')) : number_format($film['schedules'][0]['tickets'][0]['price']);
        }
        $films = $this->formatPaginate($films);
        return $this->showAll($films, Response::HTTP_OK);
    }

    /**
     * Search film in public page
     *
     * @return void
     */
    public function search()
    {
        $data = Film::with(['images'])
        ->select(['id', 'name', 'director', 'actor'])
        ->where(DB::raw("CONCAT(`name`, ' ', `director`, ' ', `actor`)"), 'LIKE', "%".request('query')."%")
        ->take(5)
        ->get();
        return $this->showAll($data);
    }
}
