<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $vacante->titulo }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg ">

                <!--le estoy ppasando a la variable dinamica del componente de livewire el valor de la variable vacante con su informacion que me traigo desde vacante.index-->
                <livewire:mostrar-vacante :vacante="$vacante" />

            </div>
        </div>
    </div>
</x-app-layout>
