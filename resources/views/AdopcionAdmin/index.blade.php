
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid #000; /* Borde de columnas */
        padding: 8px;
        text-align: left;
        color: #fff; /* Letra blanca */
    }
    th {
        background-color: #333; /* Fondo gris oscuro para los títulos */
        font-weight: bold; /* Títulos en negrilla */
    }
    td:nth-child(4), /* Columna de "Creado en" */
    td:nth-child(5) { /* Columna de "Actualizado en" */
        width: 120px; /* Columnas más estrechas */

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .row {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .col {
            flex: 5;
            margin: 0 5px; /* Espacio entre las columnas */
            text-align: center;
        }
        #buscar{
            text-align: end;
        }

    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registrar Animal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!--{{ __("You're logged in!") }}-->

                    <form method="POST" action="{{route('AdopcionAdmin.index')}}">
                        @csrf
                        <!--Fecha de encuentro-->
                        <div class="mt-3">
                            <x-input-label for="fechaEncuentro" :value="__('¿Cuando se encontro')" />
                            <x-text-input id="fechaEncuentro" class="block mt-1 w-full" type="date" name="fechaEncuentro" :value="old('name')" required autofocus autocomplete="fechaEncuentro" />
                            <x-input-error :messages="$errors->get('fechaEncuentro')" class="mt-2" />
                        </div>

                        <!--Especie-->
                        <div class="mt-3">
                            <x-input-label for="especie_Animal" :value="__('Especifique la especie')" />
                            <x-text-input id="especie_Animal" class="block mt-1 w-full" type="text" name="especie_Animal" :value="old('name')" required autofocus autocomplete="especie_Animal" />
                            <x-input-error :messages="$errors->get('especie_Animal')" class="mt-2" />
                        </div>

                        <!--Nombre asignado-->
                        <div class="mt-3">
                            <x-input-label for="nombreAnimaladopocion" :value="__('Nombre asignado')" />
                            <x-text-input id="nombreAnimaladopocion" class="block mt-1 w-full" type="text" name="nombreAnimaladopocion" :value="old('name')" required autofocus autocomplete="nombreAnimaladopocion" />
                            <x-input-error :messages="$errors->get('nombreAnimaladopocion')" class="mt-2" />
                        </div>

                        <!--Raza-->
                        <div class="mt-3">
                            <x-input-label for="raza" :value="__('cual es la raza')" />
                            <x-text-input id="raza" class="block mt-1 w-full" type="text" name="raza" :value="old('name')" required autofocus autocomplete="raza" />
                            <x-input-error :messages="$errors->get('raza')" class="mt-2" />
                        </div>

                        <!--Observaciones-->
                        <div class="mt-3">
                            <x-input-label for="observacionesAnimal" :value="__('Que observaciones')" />
                            <x-text-input id="observacionesAnimal" class="block mt-1 w-full" type="text" name="observacionesAnimal" :value="old('name')" required autofocus autocomplete="observacionesAnimal" />
                            <x-input-error :messages="$errors->get('observacionesAnimal')" class="mt-2" />
                        </div>

                        <x-primary-button class="mt-4 flex sm:justify-center h-8" >Ingresar Animal</x-primary-button>
                    </form>

                </div>
            </div>


            <div class="mt-4 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">

                <div class="container relative">
                    <div class="flex sm:justify-between h-8">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Lista de animales en refugio') }}
                        </h2>
                        <x-primary-button class="flex sm:justify-between h-8" id="toggleButton">Mostrar/ocultar tabla</x-primary-button>
                        <x-text-input id="buscar" type="text" id="searchInput" placeholder="Buscar..." class="hidden sm:flex sm:items-right sm:ml-3"></x-text-input>
                    </div>
                </div>

                <div id="tableContainer" style="display: none;">
                <table id="dataTable">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Especie</th>
                        <th>Raza</th>
                        <th>Observaciones</th>
                        <th>Estado Solicitud</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($animals as $animal)
                        <tr>
                            <td>{{ $animal->nombreAnimaladopocion}}</td>
                            <td>{{ $animal->fechaEncuentro }}</td>
                            <td>{{ $animal->especie_Animal }}</td>
                            <td>{{ $animal->raza }}</td>
                            <td>{{ $animal->observacionesAnimal }}</td>
                            <td>{{ $animal->estadoSolicitud }}</td>
                            <td><a href="{{ route('animals.edit', $animal->id )}}">Editar a</a>
                                <form action="{{ route('animals.edit', $animal->id )}}" method="POST">
                                    @csrf
                                    <x-primary-button type="submit" class="flex sm:justify-center h-8">Editar</x-primary-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('toggleButton');
            const tableContainer = document.getElementById('tableContainer');
            const searchInput = document.getElementById('searchInput');
            const dataTable = document.getElementById('dataTable');
            const rows = dataTable.getElementsByTagName('tr');

            toggleButton.addEventListener('click', function() {
                if (tableContainer.style.display === 'none') {
                    tableContainer.style.display = '';
                } else {
                    tableContainer.style.display = 'none';
                }
            });

            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.toLowerCase();

                for (let i = 1; i < rows.length; i++) { // Empezamos desde 1 para ignorar el encabezado
                    let found = false;

                    for (let j = 0; j < rows[i].cells.length; j++) {
                        const cellValue = rows[i].cells[j].textContent.toLowerCase();
                        if (cellValue.includes(searchTerm)) {
                            found = true;
                            break;
                        }
                    }

                    if (found) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            });
        });
    </script>

</x-app-layout>
