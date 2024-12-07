<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        //
        $products = Product::all();
        // dd($products);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorys = Category::all();
        return view('admin.products.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);

        $image = $request->image;
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('uploads/products', $image_new_name);

        $products = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => 'uploads/products/' . $image_new_name,

        ]);
        $products->save();
        return redirect()->route('admin.products')->with('message', 'Product Stored Successfully');
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
        //
        $products = Product::find($id);
        $categorys = Category::all();
        return view('admin.products.edit', compact('products', 'categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            "title" => "required",
            'description' => 'required',
            'category_id' => 'required',
        ]);
        $products = Product::find($id);
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/products/', $image_new_name);
            $products->image = 'uploads/products/' . $image_new_name;
        }
        $products->title = $request->title;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->category_id = $request->category_id;
        $products->save();
        return redirect()->route('admin.products')->with('message', 'Product Updated Successfully');
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
        $products = Product::find($id);
        $products->delete();
        return redirect()->back()->with('message', 'Products Deleted Successfully');
    }
}
