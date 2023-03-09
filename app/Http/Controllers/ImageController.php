<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function index($id)
    {
        $product = Product::find($id);
        $images = $product->images()->orderBy('featured', 'desc')->get();
        return view('admin.products.images.index')->with(compact('product', 'images')); //listado
    }


    public function store(Request $request, $id)
    {

        $file = $request->file('photo');
        $path = public_path() . '/images/products';
        $fileName = uniqid() . $file->getClientOriginalName();
        $moved = $file->move($path, $fileName);

        if ($moved) {
            //dd($request->all());
            $productImage = new ProductImage();
            $productImage->image = $fileName;
            //$productImage->featured = false;
            $productImage->product_id = $id;
            $productImage->save(); //INSERT
        }


        return back();
    }



    public function destroy(Request $request, $id)
    {
        //dd($request->all());
        //ProductImage::where('product_id', $id)->delete(); //Controlar error de la ForeingKey de la imagen relacionada

        $productImage = ProductImage::find($request->image_id);

        if(substr($productImage->image, 0, 4) == "http") {
            $deleted = true;
        }
        else{
            $fullPath = public_path() . '/images/products/' .  $productImage->image;
            $deleted = File::delete($fullPath);
        }

        if ($deleted) {
            $productImage->delete(); //DELETE

        }


        return back()->with('Deleted', "Imagen borrada correctamente"); //Como ya estoy en la lista, solo redirecciono a mi dirección anterior
    }

    public function select($id, $image) {
        ProductImage::where('product_id', $id)->update(
            [
                'featured' =>false
            ]
        );

        $productImage = ProductImage::find($image);
        $productImage->featured = true;
        $productImage->save();

        return back();
    }
}
