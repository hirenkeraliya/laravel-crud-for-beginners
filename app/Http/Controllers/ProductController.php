<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    /**
     * Returns the list of the products
     *
     * @return \Illuminate\Http\Response
     **/
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Returns the create page
     *
     * @return \Illuminate\Http\Response
     **/
    public function create()
    {
        return view('products.create');
    }

    /**
     * Saves the product details
     *
     * @return \Illuminate\Http\RedirectResponse
     **/
    public function store()
    {
        $validatedData = request()->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'quantity' => 'required|string',
        ]);
        $path = request()->file('avatar')->store('/uploads', ['disk' => 'public']);
        $validatedData['avatar'] = '/storage//'.$path;

        Product::create($validatedData);

        return redirect()->route('products.index');
    }
}
