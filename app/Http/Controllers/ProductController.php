<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:png,jpg|max:1000',
        ]);
        $product = new Product;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        } else {
            $product->image = 'default.jpg';
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return redirect('/')->withsuccess('Product Created !!!');
    }


    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.edit', ['product' => $product]);
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.show', ['product' => $product]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([

            'image' => 'nullable|mimes:png,jpg,xls|max:1000',
        ]);
        $product = Product::where('id', $id)->first();
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        } else {
            $product->image = 'default.jpg';
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->withsuccess('Product Updated !!!');
    }

    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return back()->withsuccess('Product Deleted!!!');
    }
}
