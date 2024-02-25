<style>
    #confirmationModalDelete {
        display: none;
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.93);
    }
    #confirmationModal {
        display: none;
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.93);
    }

    #confirmationBox {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #1c2c34 ;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
    }

    #confirmationBox h2{
        margin-top: 0;
    }

    #confirmationBox button {
        margin: 10px;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    #confirmButton {
        background-color: green;
        color: white;
    }

    #cancelButton {
        background-color: red;
        color: white;
    }

    .con {
        color: #ffffff;
    }

    .parcon{
        color: #ffffff;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 2%;

    }
    th, td {
        border: 1px solid #000; /* Borde de columnas */
        padding: 8px;
        width: 4%;
        text-align: center;
        color: #ffffff; /* Letra blanca */
        background-color: #062c33;
    }
    .obs{
        width: 15%;
    }
    .esp{
        width: 3%;
    }
    th {
        background-color: #0b2e13; /* Fondo gris oscuro para los títulos */
        font-weight: bold; /* Títulos en negrilla */
        color: #ffffff;
    }
    td:nth-child(4), /* Columna de "Creado en" */
    td:nth-child(5) { /* Columna de "Actualizado en" */
        width: 120px; /* Columnas más estrechas */

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }


    }
    .updated_at{
        font-size: 70%;
        text-align: left;
    }
    .fecha{
        font-size: 70%;
        text-align: center;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion Animal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!--{{ __("You're logged in!") }}-->

                    <div class="mt-4 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
                        <div class="container relative">
                            <div class="flex sm:justify-between h-8">
                                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                    {{ __('Registrar un nuevo Animal') }}
                                </h2>
                                <x-primary-button class="flex sm:justify-between h-8 text-gray-800 dark:text-green-200" id="toggleFormButton">Registrar Ahora</x-primary-button>
                            </div>
                        </div>

                 <div id="formContainer" style="display: none;">
                    <form method="POST" action="{{route('AdopcionAdmin.index')}}"  id="miFormulario" onsubmit="return validarFormulario()" enctype="multipart/form-data">
                        @csrf
                        <!--Fecha de encuentro-->
                        <div class="mt-3">
                            <x-input-label for="fechaEncuentro" :value="__('¿Cuando se encontro')" />
                            <x-text-input id="fechaEncuentro" class="block mt-1 w-full" type="date" name="fechaEncuentro"  autofocus autocomplete="fechaEncuentro" />
                            <x-input-error :messages="$errors->get('fechaEncuentro')" class="mt-2" />
                        </div>

                        <!--Especie-->
                        <div class="mt-3">
                            <x-input-label for="especie_Animal" :value="__('Especifique la especie')" />

                            
                            <!--<x-text-input id="especie_Animal" class="block mt-1 w-full" type="text" name="especie_Animal" :value="old('name')" required autofocus autocomplete="especie_Animal" />
                            <x-input-error :messages="$errors->get('especie_Animal')" class="mt-2" />-->
                        </div>

                        <!--Nombre asignado-->
                        <div class="mt-3">
                            <x-input-label for="nombreAnimaladopocion" :value="__('Nombre asignado')" />
                            <x-text-input id="nombreAnimaladopocion" class="block mt-1 w-full" type="text" name="nombreAnimaladopocion" :value="old('name')" required autofocus autocomplete="nombreAnimaladopocion" />
                            <x-input-error :messages="$errors->get('nombreAnimaladopocion')" class="mt-2" />
                        </div>

                        <!--Raza-->
                        <div class="mt-3">
                            <x-input-label for="raza" :value="__('¿Cual es la raza?')" />
                            <x-text-input id="raza" class="block mt-1 w-full" type="text" name="raza" :value="old('name')" required autofocus autocomplete="raza" />
                            <x-input-error :messages="$errors->get('raza')" class="mt-2" />
                        </div>

                        <!--Observaciones-->
                        <div class="mt-3">
                            <x-input-label for="observacionesAnimal" :value="__('Que observaciones')" />
                            <x-text-input id="observacionesAnimal" class="block mt-1 w-full" type="text" name="observacionesAnimal" :value="old('name')" required autofocus autocomplete="observacionesAnimal" />
                            <x-input-error :messages="$errors->get('observacionesAnimal')" class="mt-2" />
                        </div>

                        <div class="mt-4 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
                            <div class="container relative">
                                <div class="flex sm:justify-between h-8">
                                    <!--Imagen-->
                                    <div class="mt-3">
                                        <x-input-label for="img" :value="__('Subir Imgen del animal')" />
                                        <input id="img" class="block mt-1 w-full" type="file" name="img" />
                                        <!--<x-input-error :messages="$errors->get('observacionesAnimal')" class="mt-2" />-->
                                    </div>
                                    <x-primary-button class="mt-4 flex sm:justify-center h-8" >Ingresar Animal</x-primary-button>
                                </div>
                            </div>
                        </div>
                    </form>
                 </div>
                </div>
            </div>
        </div> <!-- CIERRE DEL CONTAINER-->

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-10 lg:px-12">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">

            <div class="mt-4 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
                <div class="container relative">
                    <div class="flex sm:justify-between h-8">
                        <h2  class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Lista de animales en refugio') }}
                        </h2>
                        <x-primary-button class="flex sm:justify-between h-8" id="toggleButton">Ocultar Registros</x-primary-button>
                        <x-text-input id="buscar" type="text" id="searchInput" placeholder="Buscar..." class="hidden sm:flex sm:items-right sm:ml-3"></x-text-input>
                    </div>
                </div>

                <div id="tableContainer" style="display: block;">
                <table id="dataTable">
                    <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th class="esp">Especie</th>
                        <th>Raza</th>
                        <th class="obs">Observaciones</th>
                        <th>Actualizado</th>
                        <th>Estado Solicitud</th>
                        <!--<th>Accion</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($animals as $animal)
                        <tr>
                            <td> @if($animal->img)
                                    <img src="{{ asset('storage/' . $animal->img) }}" style="max-width: 50px; max-height: 50px;">
                                @else
                                    No hay imagen
                                @endif
                            </td>
                            <td> {{ $animal->nombreAnimaladopocion}}</td>
                            <td class="fecha">{{ $animal->created_at }}</td>
                            <td>{{ $animal->especie_Animal }}</td>
                            <td>{{ $animal->raza }}</td>
                            <td>{{ $animal->observacionesAnimal }}</td>
                            <td
                                class="updated_at">{{$animal->updated_at}}
                                @if($animal->created_at != $animal->updated_at)
                                <small class="text-sm text-black-600 dark:text-black-400">&middot; {{__('editado')}}</small>
                               @endif
                            <td>{{ $animal->estadoSolicitud }}
                               <!--can('update',$animal)-->
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        @csrf
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link href="{{ route('animals.edit', $animal->id )}}">
                                            Editar
                                        </x-dropdown-link>
                                        <form method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <x-dropdown-link href="#"  onclick="event.preventDefault();this.closest('form').submit; openConfirmationDel('{{ route('Animals.delete', $animal->id )}}')">
                                                Eliminar
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                                <!-- endcan-->
                            </td>
                            <!--<td>
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                <x-dropdown-link href="{{ route('animals.edit', $animal->id )}}">
                                    Editar
                                </x-dropdown-link>
                                    </x-slot>
                                </x-dropdown>

                                <a href="{{ route('animals.edit', $animal->id )}}">Editar a</a>
                                <form action="{{ route('animals.edit', $animal->id )}}" method="POST">
                                    @csrf
                                    <x-primary-button type="submit" class="flex sm:justify-center h-8">Editar</x-primary-button>
                                </form>
                            </td>-->
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cuadro de confirmación Registro -->
    <div id="confirmationModal">
        <div id="confirmationBox">
            <h2 class="con">Confirmación</h2>
            <p class="parcon">¿Estás seguro de realizar el registro?</p>
            <x-primary-button onclick="confirmAction()" class="mt-4 flex sm:justify-center h-8" >Confirmar</x-primary-button>
            <!--<button id="confirmButton" onclick="confirmAction()">Confirmar</button>-->
            <button id="cancelButton" onclick="closeConfirmation()">Cancelar</button>
        </div>
    </div>

    <!-- Cuadro de confirmación Eliminar-->
    <div id="confirmationModalDelete">
        <div id="confirmationBox">
            <h2 class="con">Confirmación</h2>
            <p class="parcon">¿Estás seguro deseas eliminar?</p>
            <x-primary-button onclick="confirmActionDel()" class="mt-4 flex sm:justify-center h-8" >Confirmar</x-primary-button>
            <!--<button id="confirmButton" onclick="confirmAction()">Confirmar</button>-->
            <button id="cancelButton" onclick="closeConfirmationDel()">Cancelar</button>
        </div>
    </div>


    <script>
        // Obtener el campo de fecha
        var fechaEncuentroInput = document.getElementById('fechaEncuentro');

        // Obtener la fecha actual
        var fechaActual = new Date().toISOString().split('T')[0];

        // Asignar la fecha actual al campo de fecha
        fechaEncuentroInput.value = fechaActual;

        var urlToDelete; // Variable global para almacenar la URL de eliminación

        // Función para mostrar el cuadro de confirmación de eliminación
        function openConfirmationDel(url) {
            urlToDelete = url; // Almacenar la URL de eliminación
            document.getElementById('confirmationModalDelete').style.display = 'block';
        }

        // Función para confirmar la eliminación
        function confirmActionDel() {
            // Enviar una solicitud de eliminación al servidor
            fetch(urlToDelete, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Asegúrate de enviar el token CSRF si lo estás utilizando
                    'Content-Type': 'application/json'
                }
            })
                .then(response => {
                    if (response.ok) {
                        //window.location.reload(); ->Vuelve a cargar la pagina.
                    } else {
                        // Ocurrió un error durante la eliminación
                        // Aquí puedes manejar el error como desees
                    }
                })
                .catch(error => {
                    console.error('Error al eliminar el animal:', error);
                })
                .finally(() => {
                    // Cerrar el cuadro de confirmación después de confirmar la acción
                    closeConfirmationDel();
                    window.location.href = '{{ route('AdopcionAdmin.index') }}';
                });
        }
        // Función para cerrar el cuadro de confirmación
        function closeConfirmationDel() {
            document.getElementById('confirmationModalDelete').style.display = 'none';
        }

        function validarFormulario() {
            // Validar los campos del formulario
            // Por ejemplo, puedes verificar si los campos están llenos
            // Si los campos no están llenos, muestra un mensaje de error y devuelve false
            if (!document.getElementById('fechaEncuentro').value || !document.getElementById('especie_Animal').value || !document.getElementById('nombreAnimaladopocion').value || !document.getElementById('raza').value || !document.getElementById('observacionesAnimal').value) {
                alert("Por favor, complete todos los campos.");
                return false;
            }
            openConfirmation(document.getElementById('miFormulario'));
            // Devuelve false para evitar que el formulario se envíe automáticamente
            return false;
        }
        var formToSubmit
        // Función para mostrar el cuadro de confirmación y almacenar el formulario
        function openConfirmation(form) {
            formToSubmit = form; // Almacenar el formulario
            document.getElementById('confirmationModal').style.display = 'block';
        }

        // Función para cerrar el cuadro de confirmación
        function closeConfirmation() {
            document.getElementById('confirmationModal').style.display = 'none';
        }

        // Función para confirmar la acción y enviar el formulario
        function confirmAction() {
            // Aquí puedes agregar la lógica para realizar el registro
            formToSubmit.submit(); // Enviar el formulario almacenado
            // Cerrar el cuadro de confirmación después de confirmar la acción
            closeConfirmation();
        }

        document.getElementById("toggleFormButton").addEventListener("click", function() {
            var formContainer = document.getElementById("formContainer");
            if (formContainer.style.display === "none") {
                formContainer.style.display = "block";
                this.textContent = "Cancelar registro";
            } else {
                formContainer.style.display = "none";
                this.textContent = "Registrar";
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('toggleButton');
            const searchInput = document.getElementById('searchInput');
            const dataTable = document.getElementById('dataTable');
            const rows = dataTable.getElementsByTagName('tr');

            toggleButton.addEventListener('click', function() {
                if (tableContainer.style.display === 'none') {
                    tableContainer.style.display = '';
                    this.textContent = "Ocultar Tabla";
                } else {
                    tableContainer.style.display = 'none';
                    this.textContent = "Mostrar Tabla";
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
