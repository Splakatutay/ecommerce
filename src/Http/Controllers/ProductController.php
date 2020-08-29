<?php

namespace Rcborinaga\Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Rcborinaga\Ecommerce\Models\Product;     

class ProductController extends Controller
{

    public function index()
    {

        $products = Product::all();

        return view('ecommerce.products.index', compact('products'));

    }


    public function create() {

        return view('ecommerce.products.create');

    }
    
    public function show()
    {
        //
    }
    
    public function store(Request $request)
    {

        $product = Product::create([
            'name'          => $request->name ,
            'quantity'      => $request->quantity ,
            'description'   => $request->description
        ]);

        return redirect('/products');

    }
}