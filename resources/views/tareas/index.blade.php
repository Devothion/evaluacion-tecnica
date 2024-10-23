<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Tareas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <div class="mb-8 mx-auto">
                        <a href="{{ route('tareas.create') }}" class="btn btn-success text-white w-28"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-3.5 md:size-5">
                                <path fill="#ffffff" d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 38.6C310.1 219.5 256 287.4 256 368c0 59.1 29.1 111.3 73.7 143.3c-3.2 .5-6.4 .7-9.7 .7L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zm48 96a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm16 80c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 48-48 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l48 0 0 48c0 8.8 7.2 16 16 16s16-7.2 16-16l0-48 48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0 0-48z" /></svg>Crear</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full table table-auto">
                            <thead class="text-gray-700 uppercase">
                                <tr>
                                    <th>ID</th>
                                    <th>TITULO</th>
                                    <th class="hidden md:table-cell">DESCRIPCIÓN</th>
                                    <th class="hidden md:table-cell">FECHA DE VENCIMIENTO</th>
                                    <th>ESTADO</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($tareas->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center">No hay tareas registradas</td>
                                </tr>
                                @else
                                @foreach ($tareas as $tarea)
                                <tr>
                                    <td>{{ $tarea->id }}</td>
                                    <td>{{ $tarea->titulo }}</td>
                                    <td class="hidden md:table-cell">{{ $tarea->descripcion }}</td>
                                    <td class="hidden md:table-cell">{{ $tarea->fecha_transformada }}</td>
                                    <td>
                                        @if($tarea->estado == 'pendiente')
                                            Pendiente
                                        @elseif($tarea->estado == 'en_progreso')
                                            En progreso
                                        @else
                                            Completada
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex flex-col gap-1">
                                            <div>
                                                <a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-sm btn-info text-white w-28"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-3.5 md:size-5">
                                                        <path fill="#ffffff" d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" /></svg>Ver</a>
                                            </div>
                                            <div>
                                                <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-sm btn-warning text-white w-28"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-3.5 md:size-5">
                                                        <path fill="#ffffff" d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" /></svg>Editar</a>
                                            </div>
                                            <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta tarea con ID: {{ $tarea->id }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-error text-white w-28"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-3.5 md:size-5">
                                                        <path fill="#ffffff" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.7 23.7 0 0 0 -21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0 -16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z" /></svg>Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        @if($tareas->count() > 10)

                        @else
                        <!-- Agrega la paginación aquí -->
                        <div class="mt-4">
                            {{ $tareas->links() }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
    <div class="toast toast-end">
        <div class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-3.5 md:size-5">
                <path fill="#ffffff" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" /></svg>
            <span class="text-white">{{ session('success') }}</span>
        </div>
    </div>
    @endif

</x-app-layout>
