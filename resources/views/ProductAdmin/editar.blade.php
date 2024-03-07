<style>
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
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('products.update', $product->id_product) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mt-3">
                            <x-input-label for="product_name" :value="__('Nombre del producto')" />
                            <x-text-input id="product_name" class="block mt-1 w-full" type="text" name="product_name" :value="old('product_name', $product->product_name)" required autofocus />
                            <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                        </div>
                        <div class="mt-3">
                            <x-input-label for="product_price" :value="__('Precio del producto')" />
                            <x-text-input id="product_price" class="block mt-1 w-full" type="number" name="product_price" :value="old('product_price', $product->product_price)" required />
                            <x-input-error :messages="$errors->get('product_price')" class="mt-2" />
                        </div>
                        <div class="mt-3">
                            <x-input-label for="descripcion" :value="__('Descripción del producto')" />
                            <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="old('descripcion', $product->descripcion)" required />
                            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                        </div>
                        <div class="mt-3">
                            <x-input-label for="stock" :value="__('Stock del producto')" />
                            <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" :value="old('stock', $product->stock)" required />
                            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                        </div>
                        <div class="mt-3">
                            <x-input-label for="img" :value="__('Imagen del producto')" />
                            <input id="img" class="block mt-1 w-full" type="file" name="img" />
                        </div>
                        <x-primary-button class="mt-4 flex sm:justify-center h-8">Actualizar Producto</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>