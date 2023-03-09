<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome(){
        $products = Product::all();
        return view('home')->with(compact('products'));
    }

}
