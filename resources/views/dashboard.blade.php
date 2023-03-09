<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Control') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    {{ __("Logueado con exito") }}
                </div>
                @livewire('button-perfil')


            </div>
        </div>
    </div>

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

                        <p>TU CARRITO DE LA COMPRA</p>
                        @if (session('notification'))
                        <div class="alert alert-success">
                            {{session('notification')}}
                        </div>
                    @endif
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach (auth()->user()->cart->first()->details as $detail)
                                <tr>
                                    <td>
                                        <img src="{{$detail->product->featured_image_url }}" style="max-width: 100px">
                                    </td>
                                    <td>
                                        <a href="{{ url('/' . 'admin/products/' . $detail->product->id) }}"> {{ $detail->product->name }}</a>
                                    </td>
                                    <td>{{ $detail->product->price }}€</td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td>{{ $detail->quantity * $detail->product->price }}€</td>
                                    <td>
                                        <a href="{{url('/admin/products/'. $detail->product->id)}}"  type="button" class="btn btn-outline-success">Ver</a>
                                        <form method="post" action="{{url('/cart')}}">

                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                                            <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <form method="post" action="{{ url('/order')}}">
                            @csrf
                            <button class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded-full">
                                Realizar pedido
                              </button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
