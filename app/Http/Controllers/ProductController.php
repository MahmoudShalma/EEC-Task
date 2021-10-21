<?php

namespace App\Http\Controllers;

use App\models\Product;
use Illuminate\Http\Request;

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
        return view('pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|unique:products|max:200',
            'image' => 'required',
        ]);

        $file_extion = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extion;
        $path = 'images/products';
        $request->image->move($path, $file_name);

        $product = new Product();

        $product->name = $request->name;
        $product->image = $file_name;
        $product->save();

        return redirect(route('products.index'))->with('success', 'Product added successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = Product::findorfail($id);

        return view('pages.Products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|unique:products,name,' . $request->id . '|max:200',
        ]);


        $product = Product::findorfail($request->id);
        if ($request->image != null) {
            $file_extion = $request->image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extion;
            $path = 'images/products';
            $request->image->move($path, $file_name);
            unlink('images/products/' . $product->image);
            $product->image = $file_name;
        }
        $product->name = $request->name;
        $product->save();

        return redirect(route('products.index'))->with('success', 'Product Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = Product::findorfail($id);

        if (is_file('images/products/' . $product->image)) {
            unlink('images/products/' . $product->image);
        }
        Product::destroy($id);


        return redirect()->back()->with('success', 'Product Deleted successfully');
    }
}
