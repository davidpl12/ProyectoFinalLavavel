<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <div class="team">

                        @if (session('delete'))
                            <div class="alert alert-success">
                                {{session('delete')}}
                            </div>
                        @endif
                        @if (session('update'))
                            <div class="alert alert-success">
                                {{session('update')}}
                            </div>
                        @endif

                        @livewire('button-perfil')

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Admin</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->apell }}</td>
                                    <td>{{ $user->address ?? '-' }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>

                                        @if ($user->admin === 1)
                                        <p>Sí</p>
                                    @elseif ($user->admin === 0)
                                        <p>No</p>
                                    @endif
                                    </td>
                                    <td>
                                        <a href="{{url('/admin/users/'. $user->id)}}" type="button" class="btn btn-outline-success">Ver</a>
                                        <a href="{{url('/admin/users/'. $user->id .'/edit')}}" type="button" class="btn btn-outline-primary">Editar</a>

                                        <form method="post" action="{{url('/admin/users/'. $user->id)}}">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{$users->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>



</x-app-layout>
