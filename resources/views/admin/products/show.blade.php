<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Detalle del Producto') }}
        </h2>
    </x-slot>

    <div class="container py-12">

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="p-6 text-gray-900 text-center pb-20">
                @if (session('notification'))
                <div class="alert alert-success">
                    {{session('notification')}}
                </div>
            @endif
                <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
                    {{ __($products->name) }}
                </h2>
                <h5>{{ $products->category->name }}</h5>
            </div>

            <div class="row">
                <div class="col-sm-6 ">
                    <img class="rounded-t-lg pl-12 pb-12 m-auto" src="{{ $products->featured_image_url }}"
                        alt="" />

                </div>
                <div class="col-sm-6 ">

                    <p class="mb-3 mr-28 font-normal text-gray-700 dark:text-gray-400">{{ $products->long_description }}
                    </p>
                    <p class="mb-3 mr-2 font-blond text-gray-700 dark:text-gray-400"> {{ $products->price }}€</p>

                    <div>
                        <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" data-toggle="modal" data-target="#dialogo1">Añadir al carrito</button>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-sm-3 ">
                </div>
                <div class="col-sm-6">

                    <div class="row mt-10">

                        @foreach ($images as $image)
                            <div class="col-md-6">
                                <div class="card mb-3">

                                    <img src="{{ $image->url }}" alt="" class="pl-3 pr-3 pt-3 pb-2">

                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
                <div class="col-sm-3 ">
                </div>

            </div>




        </div>
    </div>

    <div class="container">

        <div class="modal fade" id="dialogo1">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- cabecera del diálogo -->
              <div class="modal-header">
                <h4 class="modal-title">Seleccione la cantidad que sea agregar</h4>
                <button type="button" class="close" data-dismiss="modal">X</button>
              </div>

              <form method="post" action="{{ url('/cart')}}">
                @csrf

                <input type="hidden" name="product_id" id="product_id" value="{{ $products->id}}">
                <!-- cuerpo del diálogo -->
                <div class="modal-body">
                    <input type="number" name="quantity" value="1" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
                </div>

                <!-- pie del diálogo -->
                <div class="modal-footer">
                    <button type="button" class="bg-red-800 hover:bg-red-900 text-white font-bold py-2 px-4 rounded" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded">Añadir al Carrito</button>
                </div>

              </form>


            </div>
          </div>
        </div>

      </div>

</x-app-layout>
