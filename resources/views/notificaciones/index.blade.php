<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">

                    <h1 class="text-2xl font-bold text-center my-10">Mis Notificaciones</h1>

                    <!--recuerda algo imortante ya laravel gracia a lo que se hizo reconoce el usuario al momento de las notificaciones enotnces ya si el usuario no tiene notificaciones laravel lo identifica y le pone la segunda respuesta del forelse-->
                    <!--laravel guarda la referencia de a que usuario se esta notificando y solamente ese usuario poodra ver las notificaciones -->
                    <div class="divide-y divide-gray-200">
                        @forelse ($notificaciones as $notificacion)
                            <div class="p-5 lg:flex lg:justify-between lg:items-center">
                                <div>
                                    <p>Tienes un nuevo candidato en:
                                        <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                                    </p>

                                    <p>
                                        <span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>
                                <div class="mt-5 lg:mt-0">
                                    <a href="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}"
                                        class="bg-indigo-500 hover:bg-indigo-600 p-3 text-sm uppercase font-bold text-white rounded-lg">
                                        Ver candidatos
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-600">No hay notificaciones Nuevas</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
