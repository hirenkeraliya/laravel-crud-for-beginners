<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Storage;

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
            'avatar' => 'required|file',
        ]);

        $path = request()->file('avatar')->store('/uploads', ['disk' => 'public']);
        $validatedData['avatar'] = $path;

        Product::create($validatedData);

        return redirect()->route('products.index');
    }

    /**
     * Returns the edit page
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     **/
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }


    /**
     * Updates the specified product
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\RedirectResponse
     **/
    public function update(Product $product)
    {
        $validatedData = request()->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'quantity' => 'required|string',
            'avatar' => 'nullable|file',
        ]);

        unset($validatedData['avatar']);

        if (request('avatar')) {
            Storage::disk('public')->delete($product->avatar);
            $path = request()->file('avatar')->store('/uploads', ['disk' => 'public']);
            $validatedData['avatar'] = $path;
        }

        $product->update($validatedData);

        return redirect()->route('products.index');
    }
}
