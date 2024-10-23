<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear nueva Tarea') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('tareas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-3 grid-rows-1 gap-4">
                            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}" />
                            <input type="hidden" id="dni" name="dni" value="{{ Auth::user()->dni }}" />
                            <div>
                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text">Titulo</span>
                                    </div>
                                    <input type="text" id="titulo" name="titulo" class="input input-bordered w-full" value="{{ old('titulo') }}" />
                                </label>
                            </div>
                            <div>
                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text">Estado</span>
                                    </div>
                                    <input type="text" id="estado" name="estado" class="input input-bordered w-full" value="pendiente" readonly />
                                </label>
                            </div>
                            <div>
                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text">Fecha de Vencimiento</span>
                                    </div>
                                    <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" class="input input-bordered w-full" value="{{ old('fecha_vencimiento') }}" />
                                </label>
                            </div>
                            <div class="md:col-span-3">
                                <label class="form-control">
                                    <div class="label">
                                        <span class="label-text">Descripción</span>
                                    </div>
                                    <textarea class="textarea textarea-bordered h-24" id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
                                </label>
                            </div>
                        </div>



                        <div class="my-4 mx-auto">
                            <a href="{{ route('tareas.index') }}" class="btn btn-error text-white"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-3.5 md:size-5">
                                    <path fill="#ffffff" d="M48 256a208 208 0 1 1 416 0A208 208 0 1 1 48 256zm464 0A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM256 128l-32 0L96 256 224 384l32 0 0-80 128 0 0-96-128 0 0-80z" /></svg>Cancelar</a>
                            <button type="submit" class="btn btn-success text-white"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-3.5 md:size-5">
                                    <path fill="#ffffff" d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 38.6C310.1 219.5 256 287.4 256 368c0 59.1 29.1 111.3 73.7 143.3c-3.2 .5-6.4 .7-9.7 .7L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM288 368a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm211.3-43.3c-6.2-6.2-16.4-6.2-22.6 0L416 385.4l-28.7-28.7c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6l40 40c6.2 6.2 16.4 6.2 22.6 0l72-72c6.2-6.2 6.2-16.4 0-22.6z" /></svg>Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="toast toast-end">
        @foreach ($errors->all() as $error)
        <div class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-3.5 md:size-5">
                    <path fill="#ffffff" d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480L40 480c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24l0 112c0 13.3 10.7 24 24 24s24-10.7 24-24l0-112c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z" /></svg>
            <span class="text-white">{{ $error }}</span>
        </div>
        @endforeach
    </div>
    @endif

</x-app-layout>
