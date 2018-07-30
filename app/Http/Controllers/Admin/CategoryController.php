<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request Request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        if (Category::create($request->all())) {
            return redirect()->route('admin.categories.index')->with('message', trans('category.admin.message.add'));
        }
        return redirect()->back()->with('message', trans('category.admin.message.add_fail'));
    }
}
