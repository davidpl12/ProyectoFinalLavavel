<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos de la Tienda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <div class="team">
                        @if (session('notification'))
                        <div class="alert alert-success">
                            {{session('notification')}}
                        </div>
                    @endif
                        <section id="gallery">
                            <div class="container">
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-md-4 mb-4">
                                            <div class="card">
                                                <img src="{{ $product->featured_image_url }}" alt="No tiene imagen" class="card-img-top">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $product->name }}</h5>
                                                    <p class="card-text mb-3" > {{ $product->category->name ?? 'None' }}</p>

                                                    <p class="card-text">{{ $product->description }}</p>
                                                    <a href="{{url('/admin/products/'. $product->id)}}" class="btn btn-outline-success btn-sm">Ver producto</a>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </section>


                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>


</x-app-layout>
