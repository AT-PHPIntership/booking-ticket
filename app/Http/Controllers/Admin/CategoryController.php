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
        $datas = Category::orderBy('id', 'desc')->paginate(5);
        return view('admin.pages.categories.index', compact('datas'));
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category Category
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        try {
            return view('admin.pages.categories.edit', compact('category'));
        } catch (Exception $e) {
            return redirect()->route('admin.categories.index')
                             ->with('message', trans('category.admin.message.edit_fail'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request  Request
     * @param Category                 $category Category
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCategoryRequest $request, Category $category)
    {
        try {
            $category->name = $request->name;
            $category->save();
            return redirect()->route('admin.categories.index')
                             ->with('message', trans('category.admin.message.edit'));
        } catch (Exception $e) {
            return redirect()->route('admin.categories.index')
                             ->with('message', trans('category.admin.message.edit_fail'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category Category
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('admin.categories.index')
                             ->with('message', trans('category.admin.message.del'));
        } catch (Exception $e) {
            return redirect()->route('admin.categories.index')
                             ->with('message', trans('category.admin.message.del_fail'));
        }
    }
}
