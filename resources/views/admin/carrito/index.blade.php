<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Productos') }}
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

                        <a href="{{ url('/admin/products/create') }}" class="btn btn-primary">Nuevo Producto</a>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (auth()->user()->cart->details as $detail)
                                <tr>
                                    <td>
                                        <img src="{{$detail->product->featured_image_url }}">
                                    </td>
                                    <td>
                                        <a href="{{ url('/' . 'products/' . $detail->product->id) }}"> {{ $detail->product->name }}</a>
                                        </td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <a href="{{url('/admin/products/'. $detail->product->id)}}"  type="button" class="btn btn-outline-success">Ver</a>
                                        <form method="post" action="{{url('/admin/products/'. $detail->product->id)}}">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>
