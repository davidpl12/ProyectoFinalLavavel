<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar nuevo producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="team">

                        @if ($errors->any())

                                    @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        <ul>
                                        <li>
                                            {{$error}}
                                        </li>
                                    </ul>

                                </div>
                                    @endforeach

                        @endif


                        <form method="post" action="{{url('admin/products')}}">
                            @csrf
                           <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="name">Nombre del producto</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Aquí el nombre" value="{{old('name')}}">
                              </div>
                              <div class="form-group col-sm-6">
                                <label for="price">Precio</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Precio en numero del producto" value="{{old('price')}}">
                              </div>
                           </div>

                           <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="description">Descripcion corta</label>
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Descripcion corta del producto" value="{{old('description')}}">
                                </div>

                                <div class="form-group col-sm-6 mt-3">
                                    <label for="category_id">Categoria</label>
                                    <select name="category_id" id="category_id">
                                        <option value="0">None</option>
                                        @foreach ($categories as $category )
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                           </div>



                           <div class="form-group">
                            <label for="long_description">Descripción larga del producto</label>
                            <textarea class="form-control" id="long_description"  name="long_description" placeholder="Aquí la descripción larga y detalada del producto" rows="5">{{old('long_description')}}</textarea>
                          </div>
                          <button class="btn btn-primary">Crear producto</button>
                        </form>


                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>


</x-app-layout>
