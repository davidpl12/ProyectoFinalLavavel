<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use Exception;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        //dd(auth()->user()->cart->first());
    	$cartDetail = new CartDetail();
        try {
            $cartDetail->cart_id = auth()->user()->cart->first()->id;
        } catch (Exception $th) {
            //throw $th;
        }
    	$cartDetail->product_id = $request->product_id;

    	$cartDetail->quantity = $request->quantity;
    	$cartDetail->save();

		$notification = 'El producto se ha cargado a tu carrito de compras exitosamente!';
    	return redirect('/')->with(compact('notification'));
    }

    public function destroy(Request $request)
    {
    	$cartDetail = CartDetail::find($request->cart_detail_id);

    	if ($cartDetail->cart_id == auth()->user()->cart->first()->id)
    		$cartDetail->delete();

    	$notification = 'El producto se ha eliminado del carrito de compras correctamente.';
    	return back()->with(compact('notification'));
    }
}
