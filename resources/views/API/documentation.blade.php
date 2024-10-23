<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Documentación de la API') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold text-gray-900">Usuarios</h1>
                    <h3 class="text-lg text-gray-900 mt-3">Nuevo usuario</h3>
                    <p class="mt-2 text-sm text-gray-600">Para crear un nuevo usuario en la aplicación por medio de la API.</p>
                    <div class="mockup-code mt-2">
                        <pre><code><span class="text-yellow-600">POST</span> http://localhost:8000/api/users</code></pre>
                    </div>
                    <p class="mt-2 text-sm text-gray-600">Los campos requeridos para crear un nuevo usuario son:</p>
                    <div class="mockup-code mt-2">
                        <pre><code>{ 
    "name": "string",
    "email": "string",
    "dni": "string",       
    "password": "string",
  }</code></pre>
                    </div>
                    <p class="mt-2 text-sm text-gray-600">Esto devolverá un <strong>token de usuario</strong> para que puedas acceder a la API REST de las Tareas.</p>
                    
                    <div class="flex w-full flex-col">
                        <div class="divider"></div>
                    </div>

                    <h1 class="text-3xl font-bold text-gray-900">Tareas</h1>

                    <p class="mt-2 text-sm text-gray-600">Para poder manejar todas la operaciones de las tareas se requiere de un token de usuario creado por medio de la API o creado por medio de la de perfil de usuario dentro de la aplicación web. Una vez adquirido el token, debes ingresarlo en la cabecera <strong>Authorization</strong> de cada petición a la API.</p>
                    <div class="mockup-code mt-2">
                        <pre><code>Authorization: Bearer {token}</code></pre>
                    </div>

                    <h3 class="text-lg text-gray-900 mt-7">Obtener todas las tareas</h3>
                    <p class="mt-2 text-sm text-gray-600">Para obtener todas las tareas creadas.</p>
                    <div class="mockup-code mt-2">
                        <pre><code><span class="text-green-600">GET</span> http://localhost:8000/api/v1/tareas</code></pre>
                    </div>

                    <h3 class="text-lg text-gray-900 mt-7">Crear una nueva tarea</h3>
                    <p class="mt-2 text-sm text-gray-600">Para crear una nueva tarea en la aplicación por medio de la API.</p>
                    <div class="mockup-code mt-2">
                        <pre><code><span class="text-yellow-600">POST</span> http://localhost:8000/api/v1/tareas</code></pre>
                    </div>
                    <p class="mt-2 text-sm text-gray-600">Los campos requeridos para crear una nueva tarea son:</p>
                    <div class="mockup-code mt-2">
                        <pre><code>{ 
    "titulo": "string",
    "descripcion": "nullabe|string",
    "fecha_vencimiento": "string",       
  }</code></pre>
                    </div>

                    <h3 class="text-lg text-gray-900 mt-7">Obtener una sola tarea</h3>
                    <p class="mt-2 text-sm text-gray-600">Para crear obtener una sola tarea especifica por medio de la API, donde {id} es el ID de la tarea.</p>
                    <div class="mockup-code mt-2">
                        <pre><code><span class="text-green-600">GET</span> http://localhost:8000/api/v1/tareas/{id}</code></pre>
                    </div>

                    <h3 class="text-lg text-gray-900 mt-7">Actualizar una tarea</h3>
                    <p class="mt-2 text-sm text-gray-600">Para crear actualizar una tarea en especifico por medio de la API.</p>
                    <div class="mockup-code mt-2">
                        <pre><code><span class="text-blue-400">PUT</span> http://localhost:8000/api/v1/tareas/{id}</code></pre>
                    </div>
                    <p class="mt-2 text-sm text-gray-600">Los campos requeridos para actualizar una tarea son:</p>
                    <div class="mockup-code mt-2">
                        <pre><code>{ 
    "titulo": "nullable|string",
    "descripcion": "nullabe|string",
    "fecha_vencimiento": "nullabe|date",
    "estado": "nullabe|in:pendiente,en_progreso,completada",     
  }</code></pre>
                    </div>

                    <h3 class="text-lg text-gray-900 mt-7">Eliminar una tarea</h3>
                    <p class="mt-2 text-sm text-gray-600">Para crear eliminar una sola tarea especifica por medio de la API, donde {id} es el ID de la tarea.</p>
                    <div class="mockup-code mt-2">
                        <pre><code><span class="text-red-600">DELETE</span> http://localhost:8000/api/v1/tareas/{id}</code></pre>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
