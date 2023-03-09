<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Imagenes del Producto "' . $product->name) . '"'}}
        </h2>
    </x-slot>

    <div class="container mt-4 pl-32 pr-32">
        <div class="card">
            <div class="card-body m-auto">

                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="photo" required>
                    <button type="submit" class="btn btn-outline-primary">Subir nueva imagen</button>
                    <a href="{{ url('/admin/products') }}" class="btn btn-outline-warning">Volver al listado del
                        producto</a>

                </form>
            </div>
        </div>

        <div class="row mt-4">

            @foreach ($images as $image)
                <div class="col-md-4">
                    <div class="card mb-3">

                            <img src="{{ $image->url }}" alt="" class="pl-12 pr-12 pt-12 pb-2">

                            <form method="post" action="">

                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="image_id" value="{{ $image->id }}" class="inline-block">
                                <button type="submit" class="btn btn-outline-danger mr-2 ml-12 mb-4">Eliminar</button>
                                @if ($image->featured)
                                <button type="button" class="btn btn-outline-info mr-12 mb-4">Favorita</button>

                                @else
                                <a href="/admin/products/{{$product->id}}/images/select/{{$image->id}}" class="btn btn-outline-primary mr-12 mb-4">Hacer favorita</a>

                                @endif

                            </form>

                    </div>
                </div>
            @endforeach

        </div>


    </div>


</x-app-layout>
