<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Detalles de ' . $users->name . ' ' . $users->apell) }}
        </h2>
    </x-slot>

    <div class="container py-12">

            <div class="row">

                <div class="card w-96 m-auto p-4 mb-4 mt-4" >

                    <div class="card-body">
                        <p class="mb-3 font-blond text-gray-700 dark:text-gray-400">Nombre: {{ $users->name }}</p>

                        <p class="mb-3 font-blond text-gray-700 dark:text-gray-400">Apellidos: {{ $users->apell }}</p>

                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Dirección: {{ $users->address }}</p>

                        <p class="mb-3 font-blond text-gray-700 dark:text-gray-400">Email: {{ $users->email }}</p>

                    </div>



                </div>
        </div>
    </div>
</x-app-layout>
