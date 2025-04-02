<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Candidatos Vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-2xl font-bold text-center my-10">Candidatos Vacante: {{ $vacante->titulo }}</h1>

                    <div class="md:flex md:justify-center p-5">

                        <ul class="divide-y divide-gray-200 w-full">

                            <!--se esta utilizando la relacion entre vacante y candidato para traer a los candidatos relacionados coon la vacante cliqueada-->
                            @forelse ($vacante->candidatos as $candidato)
                                <li class="p-3 flex items-center">

                                    <!--el nombre de la persona que se postulo el flex-1 toma todo el espacio-->
                                    <!--se creo la relacio en el modelo de candidato para traer el nombre del user_id y que se vea el nombre en vez del id del usuario la relacion es user-->
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-800">{{ $candidato->user->name }}</p>
                                        <p class="text-sm text-gray-600">{{ $candidato->user->email }}</p>
                                        <p class="text-sm font-medium text-gray-600">
                                            Día que se postuló: <span class="font-normal">{{ $candidato->created_at->diffForHumans() }}</span>
                                        </p>
                                    </div>


                                    <!--curriculum-->
                                    <!-- esto es un boton que te deja ver el curriculum en la web habre el docuemnto en otra pagina con la ruta que lo busca y lo abre, el rel es por segurida-->
                                    <div>
                                        <a 
                                          class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50" 
                                          href="{{ asset('storage/cv/' . $candidato->cv) }}"
                                          target="_blank"
                                          rel="noreferrer noopener" 
                                        >
                                           Ver CV
                                        </a>
                                    </div>

                                </li>
                            @empty
                                <p class="p-3 text-center text-sm text-gray-600">No hay candidatos aún</p>
                            @endforelse

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
