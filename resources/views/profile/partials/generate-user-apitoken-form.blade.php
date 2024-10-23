<section class="space-y-6" id="generate-user-apitoken">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Generar API Token') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Genera un nuevo token de usuario para manejar la API REST de las Tareas. Puedes crear un máximo de 3 tokens. El token generado se mostrara en pantalla y no se volverá a mostrar mas adelante.") }}
            Visita la <a href="{{ route('api.documentation') }}" class="link link-success">documentación de la API</a> para obtener más detalles.
        </p>
    </header>

    @if(session('token'))
    <div role="alert" class="alert shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info h-6 w-6 shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <div>
            <h3>Tu nuevo token <strong>{{ session('nombre') }}</strong> es: <strong>{{ session('token') }}</strong></h3>
            <div class="text-xs">Recuerde guardar el token porque no se volverá a mostrar mas adelante</div>
        </div>
    </div>
    @endif

    <table class="min-w-full table table-auto">
        <thead class="text-gray-700 uppercase">
            <tr>
                <th>NOMBRE</th>
                <th class="hidden md:table-cell">CÓDIGO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tokens as $token)
            <tr>
                <td>{{ $token->name }}</td>
                <td class="hidden md:table-cell">{{ $token->token }}</td>
                <td>
                    <form action="{{ route('eliminar.token', $token->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este token con nombre: {{ $token->name }}?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-error"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-3.5">
                                <path fill="#ffffff" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.7 23.7 0 0 0 -21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0 -16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z" /></svg></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">No hay tokens registrados</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @if($tokens->count() == 3)

    @else
        <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'generate-user-apitoken')">{{ __('Generar') }}</x-primary-button>
    @endif

    <x-modal name="generate-user-apitoken" :show="$errors->tokenCreation->isNotEmpty()" focusable>
        <form method="post" action="{{ route('generar.token') }}" class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('¡Generando un nuevo token de usuario!') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Introduce un nombre para poder identificar el nuevo token que vas a generar.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="nombre" value="{{ __('Nombre') }}" class="sr-only" />

                <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-3/4" placeholder="{{ __('Nombre') }}" />

                <x-input-error :messages="$errors->tokenCreation->get('nombre')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Generar Token') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>

</section>
