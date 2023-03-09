<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function PDF(){

    	$pdf = PDF::loadView('prueba');
    	return $pdf->stream('prueba.pdf');
    }

    public function PDFProductos(){

    	$products = Product::all();
    	$pdf = PDF::loadView('products', compact('products'));
    	return $pdf->stream('productos.pdf');
    }

}
