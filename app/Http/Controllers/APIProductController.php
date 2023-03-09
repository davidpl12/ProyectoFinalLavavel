<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class APIProductController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return response()->json([
            'status'=>true,
            'products'=>$product
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApiProductRequest $request)
    {
        $product = Product::create($request->all());
        return response()->json([
            'status'=>true,
            'message'=>'Producto creado correctamente',
            'products'=>$product
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json([
            'status'=>true,
            'products'=>$product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApiProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json([
            'status'=>true,
            'message'=>'Producto actualizado correctamente',
            'products'=>$product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json([
            'status'=>true,
            'message'=>'Producto borrado correctamente',
            'products'=>$product
        ]);
    }}
