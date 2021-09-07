<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        return view('product.create');
    }
    public function store(Request $request){
        Product::create([
            'name'  => $request->name,
            'price' => $request->price,
        ]);
    }
}
