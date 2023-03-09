<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Dompdf\Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products')); //listado
    }

    public function show($id)
    {
        //dd(url()->full());
        $products = Product::find($id);

        try {
            $images = $products->images;
        } catch (Exception $e) {
        }
        return view('admin.products.show')->with(compact('products', 'images'));

    }
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.products.create')->with(compact('categories')); //formulario de registro
    }
    public function store(Request $request)
    {
        //Validacion de datos
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el producto.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres.',
            'description.required' => 'Es necesario ingresar una descripcion para el producto.',
            'descripcion.max' => 'La descripción no puede superar los 200 caracteres.',
            'price.required' => 'Es necesario ingresar un precio para el producto.',
            'price.numeric' => 'El precio para el producto tiene que ser un número.',
            'price.min' => 'El precio debe ser un numero positivo.',


        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];

        $this->validate($request, $rules, $messages);


        //dd($request->all());
        $products = new Product();
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->long_description = $request->input('long_description');
        $products->category_id = $request->category_id;

        $products->save(); //INSERT

        return redirect('/admin/products');
    }

    public function edit($id)
    {
        $categories = Category::orderBy('name')->get();

        $product = Product::find($id);

        return view('admin.products.edit')->with(compact('product', 'categories')); //formulario de edicion
    }
    public function update(Request $request, $id)
    {

        //Validacion de datos
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el producto.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres.',
            'description.required' => 'Es necesario ingresar una descripcion para el producto.',
            'descripcion.max' => 'La descripción no puede superar los 200 caracteres.',
            'price.required' => 'Es necesario ingresar un precio para el producto.',
            'price.numeric' => 'El precio para el producto tiene que ser un número.',
            'price.min' => 'El precio debe ser un numero positivo.',


        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];

        $this->validate($request, $rules, $messages);

        //dd($request->all());

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;

        $product->save(); //UPDATE

        $update = 'Producto actualizado correctamente';
        return redirect('/admin/products')->with(compact('update'));
    }

    public function destroy($id)
    {
        //dd($request->all());
        ProductImage::where('product_id', $id)->delete(); //Controlar error de la ForeingKey de la imagen relacionada

        $product = Product::findOrFail($id);
        $product->delete(); //DELETE

        $delete = 'Producto borrado correctamente';
        return back()->with(compact('delete')); //Como ya estoy en la lista, solo redirecciono a mi dirección anterior
    }
}
