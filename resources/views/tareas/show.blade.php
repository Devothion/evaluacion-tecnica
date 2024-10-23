<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizando Tarea N°' . $tarea->id . '') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="md:flex md:space-x-4">
                        <div class="md:w-2/3">

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">Titulo</span>
                                        </div>
                                        <input type="text" id="titulo" name="titulo" class="input input-bordered w-full" value="{{ $tarea->titulo }}" readonly />
                                    </label>
                                </div>
                                <div>
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">Estado</span>
                                        </div>
                                        <input type="text" id="estado" name="estado" class="input input-bordered w-full" value="{{ $tarea->estado }}" readonly />
                                    </label>
                                </div>
                                <div>
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">Fecha de Vencimiento</span>
                                        </div>
                                        <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" class="input input-bordered w-full" value="{{ $tarea->fecha_vencimiento }}" readonly />
                                    </label>
                                </div>
                                <div>
                                    <label class="form-control w-full">
                                        <div class="label">
                                            <span class="label-text">DNI</span>
                                        </div>
                                        <input type="text" id="dni" name="dni" class="input input-bordered w-full" value="{{ $tarea->dni }}" readonly />
                                    </label>
                                </div>
                                <div class="col-span-2">
                                    <div class="col-span-2 col-start-1 row-start-3">
                                        <label class="form-control">
                                            <div class="label">
                                                <span class="label-text">Descripción</span>
                                            </div>
                                            <textarea class="textarea textarea-bordered h-40" id="descripcion" name="descripcion" readonly>{{ $tarea->descripcion }}</textarea>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="md:w-1/3">
                            <div class="bg-zinc-100 overflow-hidden shadow-sm sm:rounded-lg my-8 min-h-80">
                                <h2 class="text-xl font-semibold text-black text-center mt-3">HISTORIAL</h2>
                                <div class="flex w-full flex-col">
                                    <div class="divider my-0"></div>
                                </div>
                                <ul>
                                    <li class="text-black m-4">Tarea creada por <strong>{{ $tarea->user->name }}</strong> {{ $tarea->created_at_human }}</li>
                                    @if($tarea->historial->count() > 0)
                                    @foreach($tarea->historial as $cambio)
                                    <li class="text-black m-4">Tarea actualizada por <strong>{{ $cambio->user->name }}</strong> {{ $cambio->updated_at_human }}</li>
                                    @endforeach
                                    @else

                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="my-4 mx-auto">
                        <a href="{{ route('tareas.index') }}" class="btn btn-error text-white"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-3.5 md:size-5">
                                <path fill="#ffffff" d="M48 256a208 208 0 1 1 416 0A208 208 0 1 1 48 256zm464 0A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM256 128l-32 0L96 256 224 384l32 0 0-80 128 0 0-96-128 0 0-80z" /></svg>Volver</a>
                    </div>

                </div>



            </div>
        </div>

</x-app-layout>
