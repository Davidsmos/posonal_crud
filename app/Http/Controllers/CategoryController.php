<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category=Category::all();
        return view('Category.category', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Category.CreateCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Category::create($request->all());

        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category=Category::find($id);
        if (!$category) {
            return 'No date';
        }
        // derm3 yk data UpdateCategory=>tv kan $category
        return view('Category.UpdateCategory',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $category=Category::find($id);
        if (!$category) {
            return 'No date';
        }

        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->description=$request->description;
        $category->image=$request->image;
        $category->status=$request->status;
        $category->save();
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::find($id);
        if (!$category) {
            return 'No date';
        }
        $category->delete   ($category->$id);
        return redirect(route('category.index'));
    }
}
