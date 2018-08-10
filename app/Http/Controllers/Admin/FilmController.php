<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryFilm;
use App\Models\Film;
use App\Models\Image;
use App\Models\Ticket;
use App\Http\Requests\CreateFilmRequest;
use App\Http\Requests\EditFilmRequest;
use DB;

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param Film $film Film
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        try {
            $categories = Category::all();
            $categoryIds = $film->cateroryFilms->pluck('category_id')->toArray();
            return view('admin.pages.films.edit', compact('film', 'categories', 'categoryIds'));
        } catch (Exception $e) {
            return redirect()->route('admin.films.index')
                             ->with('message', trans('film.admin.message.edit_fail'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request Request
     * @param Film                     $film    Film
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EditFilmRequest $request, Film $film)
    {
        try {
            $film->update($request->all());
            $name = $request->del_image;
            if ($name) {
                $imagesDel = explode(",", $name);
                $imagesDataDel = array();
                for ($i = 0; $i < count($imagesDel)-1; $i++) {
                    array_push($imagesDataDel, (int) $imagesDel[$i]);
                }
                for ($i = 0; $i < count($imagesDataDel) ; $i++) { 
                    Image::where('id', $imagesDataDel[$i])->delete();
                }
            }
          
            if (request()->file('photos')) {
                foreach (request()->file('photos') as $img) {
                    $imgName = time() . '-' . str_random(5) . '-' . $img->getClientOriginalName();
                    $img->move(public_path(config('define.film.upload_image_url')), $imgName);
                    $imagesData[] = [
                        'film_id' => $film->id,
                        'path' => config('define.film.upload_image_url').$imgName
                    ];
                }
                $film->images()->createMany($imagesData);
            }
           
            $film->categories()->sync($request->categories);
            return redirect()->route('admin.films.index')->with('message', trans('film.admin.message.edit'));
        } catch (Exception $e) {
            return redirect()->route('admin.films.index')
                             ->with('message', trans('category.admin.message.edit_fail'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Film $film Film
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        DB::beginTransaction();
        try {
            $film->cateroryFilms()->delete();
            $film->images()->delete();
            $film->comments()->delete();
            $film->ratings()->delete();
            foreach ($film->schedules() as $schedule) {
                $bookingDetails = BookingDetail::with('ticket.schedule')
                ->whereIn('ticket_id', $schedule->tickets()->get(['tickets.id']))
                ->get();
                foreach ($bookingDetails as $bookingDetail) {
                    $bookingDetail->delete();
                }
                $schedule->tickets()->delete();
                $schedule->delete();
            }
            $film->delete();
            DB::commit();
            return redirect()->back()->with('message', trans('film.admin.message.del'));
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('message', trans('film.admin.message.del_fail'));
        }
    }
}
