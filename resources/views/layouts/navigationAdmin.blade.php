@if(session('status'))
    <div class="bg-green-600 text-green-600 text-center text-lg font-bold p-2 ">{{session('status')}}</div>
@endif
@if(session('statusred'))
    <div class="bg-green-600 text-red-600 text-center text-lg font-bold p-2 ">{{session('statusred')}}</div>
@endif
@if(session('statusorange'))
    <div class="bg-green-600 text-orange-600 text-center text-lg font-bold p-2 ">{{session('statusorange')}}</div>
@endif

<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center ">
                    <a href="http://localhost:8000/">
                        <img src="{{ asset('images/Logo_invert.png') }}" alt="Logo de la empresa" class="Logo"style="height: 50px;  width: 130px;">
                        <!--<x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />-->
                    </a>
                </div>

                <!-- Navigation Links -->
                @if (Route::has('login'))
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @auth
                        @if (Auth::user()->role->name == 'ADMIN')
                            <!-- Sección para ADMIN -->
                    <x-nav-link :href="route('dashboardAdmin')" :active="request()->routeIs('dashboardAdmin')">
                        {{ __('(Home)') }}
                    </x-nav-link>
                    <x-nav-link :href="route('AdopcionAdmin.index')" :active="request()->routeIs('AdopcionAdmin.index')">
                        {{ __('Animales') }}
                    </x-nav-link>
                            <x-nav-link :href="route('AdopcionAdmin.solicitudesAdoption')" :active="request()->routeIs('AdopcionAdmin.solicitudesAdoption')">
                                {{ __('Solicitudes') }}
                            </x-nav-link>
                            <x-nav-link :href="route('ProductAdmin.index')" :active="request()->routeIs('ProductAdmin.index')">
                                {{ __('Productos') }}
                            </x-nav-link>
                            <x-nav-link :href="route('invoices.index')" :active="request()->routeIs('invoices.index')">
                                {{ __('Facturas') }}
                            </x-nav-link>

                        @elseif (Auth::user()->role->name == 'USER')
                            <!-- Sección para USER -->
                            <x-nav-link :href="route('dashboardUser')" :active="request()->routeIs('dashboardUser')">
                                {{ __('(Home)') }}
                            </x-nav-link>
                            <x-nav-link :href="route('AdopcionUser.index')" :active="request()->routeIs('AdopcionUser.index')">
                                {{ __('¡Adopta!') }}
                            </x-nav-link>
                            <x-nav-link :href="route('AdopcionUser.misSolicitudes')" :active="request()->routeIs('AdopcionUser.misSolicitudes')">
                                {{ __('Mis solicitudes') }}
                            </x-nav-link>
                            <x-nav-link :href="route('client.products')" :active="request()->routeIs('client.products')">
                                {{ __('Productos') }}
                            </x-nav-link>
                            <x-nav-link :href="route('client.cart')" :active="request()->routeIs('client.cart')">
                                {{ __('Carrito') }}
                            </x-nav-link>
                            <x-nav-link :href="route('user.invoices')" :active="request()->routeIs('user.invoices')">
                                {{ __('Mis Facturas') }}
                            </x-nav-link>
                           @endif
                        @endif
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name}} <h3>   {{ Auth::user()->role->name}}</h3></div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboardAdmin')" :active="request()->routeIs('dashboardAdmin')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('AdopcionAdmin.index')" :active="request()->routeIs('AdopcionAdmin.*')">
                {{ __('Animales') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('AdopcionAdmin.solicitudesAdoption')" :active="request()->routeIs('AdopcionAdmin.*')">
                {{ __('Solicitudes') }}
            </x-responsive-nav-link>
            <x-nav-link :href="route('client.products')" :active="request()->routeIs('client.products')">
                {{ __('Productos') }}
            </x-nav-link>
            <x-nav-link :href="route('client.cart')" :active="request()->routeIs('client.cart')">
                {{ __('Carrito') }}
            </x-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

