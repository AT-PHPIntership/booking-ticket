<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryFilm;
use App\Models\Film;
use App\Models\Image;
use App\Http\Requests\CreateFilmRequest;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::orderBy('id', config('define.dir_desc'))->paginate(config('define.film.limit_rows'));
        return view('admin.pages.films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $data['categories'] = $categories;
        return view('admin.pages.films.create', $data);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFilmRequest $request)
    {
        $film = Film::create($request->all());
        foreach (request()->file('photos') as $img) {
            $imgName = time() . '-' . str_random(5) . '-' . $img->getClientOriginalName();
            $img->move(public_path(config('define.film.upload_image_url')), $imgName);
            $imagesData[] = [
                'film_id' => $film->id,
                'path' => config('define.film.upload_image_url').$imgName
            ];
        }
        $film->images()->createMany($imagesData);
        $film->categories()->sync($request->categories);
        return redirect()->route('admin.films.index')->with('message', trans('film.admin.message.add'));
    }
}
