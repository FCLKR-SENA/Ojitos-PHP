<style>
    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 2%;
    }

    th, td {
        border: 1px solid #000;
        padding: 8px;
        width: 4%;
        text-align: center;
        color: #ffffff;
        background-color: #062c33;
    }

    .obs {
        width: 15%;
    }

    .esp {
        width: 3%;
    }

    th {
        background-color: #644494;
        font-weight: bold;
        color: #ffffff;
    }

    td:nth-child(4),
    td:nth-child(5) {
        width: 120px;
    }

    .updated_at {
        font-size: 70%;
        text-align: left;
    }

    .fecha {
        font-size: 70%;
        text-align: center;
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
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mt-4 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
                        <div class="container relative">
                            <div class="flex sm:justify-between h-8">
                                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                    {{ __('Registrar un nuevo Producto') }}
                                </h2>
                                <x-primary-button class="flex sm:justify-between h-8 text-gray-800 dark:text-green-200" id="toggleFormButton">Registrar Ahora</x-primary-button>
                            </div>
                        </div>

                        <div id="formContainer" style="display: none;">
                            <form method="POST" action="{{ route('ProductAdmin.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mt-3">
                                    <x-input-label for="product_name" :value="__('Nombre del producto')" />
                                    <x-text-input id="product_name" class="block mt-1 w-full" type="text" name="product_name" required autofocus />
                                    <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                                </div>
                                <div class="mt-3">
                                    <x-input-label for="product_price" :value="__('Precio del producto')" />
                                    <x-text-input id="product_price" class="block mt-1 w-full" type="number" name="product_price" required />
                                    <x-input-error :messages="$errors->get('product_price')" class="mt-2" />
                                </div>
                                <div class="mt-3">
                                    <x-input-label for="descripcion" :value="__('Descripción del producto')" />
                                    <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" required />
                                    <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                                </div>
                                <div class="mt-3">
                                    <x-input-label for="stock" :value="__('Stock del producto')" />
                                    <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" required />
                                    <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                                </div>
                                <div class="mt-3">
                                    <x-input-label for="img" :value="__('Imagen del producto')" />
                                    <input id="img" class="block mt-1 w-full" type="file" name="img" />
                                </div>
                                <x-primary-button class="mt-4 flex sm:justify-center h-8">Registrar Producto</x-primary-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mt-4 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
                        <div class="container relative">
                            <div class="flex sm:justify-between h-8">
                                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                    {{ __('Lista de Productos') }}
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
                                        <th>Precio</th>
                                        <th>Descripción</th>
                                        <th>Stock</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>
                                                @if($product->img)
                                                    <img src="{{ asset($product->img) }}" style="max-width: 80px; max-height: 80px;" alt="imagen">
                                                @else
                                                    No hay imagen
                                                @endif
                                            </td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->product_price }}</td>
                                            <td>{{ $product->descripcion }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>
                                                <x-dropdown>
                                                    <x-slot name="trigger">
                                                        <button>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                            </svg>
                                                        </button>
                                                    </x-slot>
                                                    <x-slot name="content">
                                                        <x-dropdown-link href="{{ route('products.edit', $product->id_product) }}">
                                                            Editar
                                                        </x-dropdown-link>
                                                        <form method="POST" action="{{ route('products.destroy', $product->id_product) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <x-dropdown-link href="#" onclick="event.preventDefault();this.closest('form').submit();">
                                                                Eliminar
                                                            </x-dropdown-link>
                                                        </form>
                                                    </x-slot>
                                                </x-dropdown>
                                            </td>
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

    <script>
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

                for (let i = 1; i < rows.length; i++) {
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
