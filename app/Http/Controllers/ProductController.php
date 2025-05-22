<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $products = Product::all();
    return view('products.product', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories = Category::all(); // Fetch categories for the form
        return view('products.CreateProduct', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
      Product::create([
        'name'=> $request->name,
        'slug'=> $request->slug,
        'description'=> $request->description,
        'price'=> $request->price,
        'qty'=> $request->qty,
        'category_id'=> $request->category_id,
      ]);
      return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Product::find($id);
        if (!$categories) {
            return 'No date';
        }
        // derm3 yk data UpdateProdut=>tv kan $categories
        return view('products.UpdateProduct',['categories'=>$categories]);
    }


    public function update(Request $request, $id)
    {

        $categories=Product::find($id);
        if (!$categories) {
            return 'No date';
        }

        $categories->name=$request->name;
        $categories->slug=$request->slug;
        $categories->description=$request->description;
        $categories->status=$request->status;
        $categories->save();
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
