<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\User;
use DB;

class SearchController extends ApiController
{
    /**
     * This function search when admin request search film
     *
     * @return void
     */
    public function film()
    {
        $data = Film::with(['images'])
        ->select(['id', 'name', 'director', 'actor'])
        ->where(DB::raw("CONCAT(`name`, ' ', `director`, ' ', `actor`, ' ', `producer`, ' ', `country`, ' ', `describe`)"), 'LIKE', "%".request('query')."%")
        ->limit(20)
        ->get();
        
        return $data;
    }

    /**
     * This function search when admin request search user
     *
     * @return void
     */
    public function user()
    {
        $data = User::select(['id', 'full_name', 'email', 'phone', 'address'])
        ->where(DB::raw("CONCAT(`id`, ' ', `full_name`, ' ', `email`, ' ', `phone`, ' ', `address`)"), 'LIKE', "%".request('query')."%")
        ->limit(20)
        ->get();
        return $data;
    }

    /**
     * Handle search request
     *
     * @return void
     */
    public function search()
    {
        switch (request('filter')) {
            case 'film':
                return $this->showAll($this->film(request('query')));
            case 'user':
                return $this->showAll($this->user(request('query')));
            default:
                $data[] = $this->film(request('query'));
                $data[] = $this->user(request('query'));
                return $this->showAll(collect(array_collapse($data)));
        }
    }
}
