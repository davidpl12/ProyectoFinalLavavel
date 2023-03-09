<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.index')->with(compact('users')); //listado
    }

    public function show($id)
    {
        $users = User::find($id);
        return view('admin.user.show')->with(compact('users'));
    }
    public function create()
    {

        return view('admin.user.create'); //formulario de registro
    }
    public function store(Request $request)
    {
        //Validacion de datos
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres.',
            'apell.required' => 'Es necesario ingresar unos apellidos.',
            'email.required' => 'Es necesario un email correcto de autentificación.',


        ];
        $rules = [
            'name' => 'required|min:3',
            'apell' => 'required',
            'email' => 'required'
        ];

        $this->validate($request, $rules, $messages);


        //dd($request->all());
        $users = new User();
        $users->name = $request->input('name');
        $users->apell = $request->input('apell');
        $users->address = $request->input('address');
        $users->email = $request->input('email');
        $users->admin = $request->admin;

        $users->save(); //INSERT

        return redirect('/admin/users');
    }

    public function edit($id)
    {

        $users = User::find($id);

        return view('admin.user.edit')->with(compact('users')); //formulario de edicion
    }
    public function update(Request $request, $id)
    {

        //Validacion de datos
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres.',
            'apell.required' => 'Es necesario ingresar unos apellidos.',
            'email.required' => 'Es necesario un email correcto de autentificación.',
            'email.email' => 'Es necesario que sea un email.',
            'email.unique' => 'Este usuario ya existe.',




        ];
        $rules = [
            'name' => 'required|min:3',
            'apell' => 'required',
            'email' => 'required|email|unique:users,email,'. $id,
        ];

        $this->validate($request, $rules, $messages);

        //dd($request->all());

        $users = User::find($id);
        $users->name = $request->input('name');
        $users->apell = $request->input('apell');
        $users->address = $request->input('address');
        $users->email = $request->input('email');
        $users->admin = $request->input('admin');

        $users->save(); //UPDATE

        $update = 'Usuario actualizado correctamente';
        return redirect('/admin/users')->with(compact('update'));
    }

    public function destroy($id)
    {
        //dd($request->all());

        $users = User::findOrFail($id);
        $users->delete(); //DELETE

        $delete = 'Usuario borrado correctamente';
        return back()->with(compact('delete')); //Como ya estoy en la lista, solo redirecciono a mi dirección anterior
    }
}
