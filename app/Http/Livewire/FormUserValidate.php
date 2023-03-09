<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Request;

class FormUserValidate extends Component
{
    public $name = " " ;
    public $apell ;
    public $address ;
    public $email ;
    public $admin ;

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
        $users->name = $this->name;
        $users->apell = $this->apell;
        $users->address = $this->address;
        $users->email = $this->email;
        $users->admin = $this->admin;

        $users->save(); //UPDATE

        $update = 'Usuario actualizado correctamente';
        return redirect('/admin/users')->with(compact('update'));
    }



    public function render()
    {
        return view('livewire.form-user-validate');

    }
}
