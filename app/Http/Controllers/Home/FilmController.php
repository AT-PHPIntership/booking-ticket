<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Film;

class FilmController extends Controller
{
    /**
    * Display detail of film.
    *
    * @return \Illuminate\Http\Response
    */
    public function show()
    {
        return view('public.pages.detail');
    }
}
