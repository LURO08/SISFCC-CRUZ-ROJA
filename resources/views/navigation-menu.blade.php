<nav x-data="{ open: false }" style="background-color: #d32f2f;" class="border-b border-gray-100 text-white ">

    <!-- Primary Navigation Menu -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-14 items-center">

        <!-- Logo -->
        <div class="shrink-0 flex items-center">
            <a href="{{ route('dashboard') }}">
                <svg width="50" height="50" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <!-- Cuadrado superior -->
                    <rect x="35" y="10" width="30" height="30" fill="red" stroke="white" stroke-width="4"/>

                    <!-- Cuadrados laterales -->
                    <rect x="10" y="35" width="30" height="30" fill="red" stroke="white" stroke-width="4"/>
                    <rect x="60" y="35" width="30" height="30" fill="red" stroke="white" stroke-width="4"/>

                    <!-- Cuadrado inferior -->
                    <rect x="35" y="60" width="30" height="30" fill="red" stroke="white" stroke-width="4"/>

                    <!-- Cuadrado central alargado -->
                    <rect x="30" y="37" width="40" height="26" fill="red"/>

                    <!-- Cuadrado central alargado -->
                    <rect x="37" y="30" width="26" height="40" fill="red"/>
                </svg>


            </a>

            <!-- Navigation Links for Desktop -->
            <div class="hidden sm:flex space-x-8 text-white mx-1">
                @foreach(['admin' => 'Admin', 'doctor' => 'Doctor', 'cajero' => 'Cajero', 'farmacia' => 'farmacia','almacenista' => 'Almacenista', 'socorros' => 'socorros'] as $role => $label)
                    @role($role)
                        <x-nav-link href="{{ route($role . '.index') }}" :active="request()->routeIs($role . '.index')">
                            {{ __($label . ' Dashboard') }}
                        </x-nav-link>
                    @endrole
                @endforeach
            </div>
        </div>


        <!-- farmacia Opciones -->
    @role('admin')

    <div class="hidden sm:flex space-x-8">
        @php
            // Definir las secciones y sus respectivas rutas
            $sections = [
                'Inicio' => 'admin.index', // Puedes agregar la ruta correspondiente

            ];

        @endphp

        @foreach($sections as $section => $route)
            <x-nav-link
                href="{{ route($route) }}"
                :active="request()->routeIs($route)"
                class="hover:text-gray-300">
                {{ __($section) }}
            </x-nav-link>
        @endforeach

        <x-dropdown width="48">
            <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border-b-2 border-transparent hover:border-white focus:outline-none focus:border-white">
                         {{ 'Area de Personal' }}
                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
            </x-slot>

            <x-slot name="content">
                <div class="block px-4 py-2 text-xs text-gray-600 text-white">
                    {{ __('Area de Personal') }}
                </div>
                <x-dropdown-link href="{{ route('admin.users') }}" :active="request()->routeIs('admin.users')">
                    {{ __('Usuarios') }}
                </x-dropdown-link>
                <x-dropdown-link href="{{ route('admin.personal.index') }}" :active="request()->routeIs('admin.personal.index')">
                    {{ __('Personal') }}
                </x-dropdown-link>
                <x-dropdown-link href="{{ route('admin.guardias.index') }}" :active="request()->routeIs('admin.guardias.index')">
                    {{ __('Guardias') }}
                </x-dropdown-link>
                <x-dropdown-link href="{{ route('farmacia.proveedores.index') }}" :active="request()->routeIs('farmacia.proveedores.index')">
                    {{ __('Proveedores') }}
                </x-dropdown-link>

            </x-slot>
        </x-dropdown>

        <x-dropdown  width="48">
            <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border-b-2 border-transparent hover:border-white focus:outline-none focus:border-white">
                         {{ 'Caja de Cobros ' }}
                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
            </x-slot>

            <x-slot name="content">
                <div class="block px-4 py-2 text-xs text-gray-600 text-white">
                    {{ __('Caja de Cobro') }}
                </div>
                <x-dropdown-link href="{{ route('facturas.index') }}" :active="request()->routeIs('facturas.index')">
                    {{ __('Facturas') }}
                </x-dropdown-link>
                <x-dropdown-link href="{{ route('admin.cobros.index') }}" :active="request()->routeIs('admin.cobros.index')">
                    {{ __('Cobros') }}
                </x-dropdown-link>

            </x-slot>
        </x-dropdown>



    </div>



    @endrole


        <!-- Doctor-Specific Links -->
        @role('doctor')
        <div class="hidden sm:flex space-x-8">
            @php
                // Definir las secciones y sus respectivas rutas
                $sections = [
                    'Inicio' => 'doctor.index', // Puedes agregar la ruta correspondiente
                    'Pacientes' => 'doctor.pacientes.index',
                ];


            @endphp

            @foreach($sections as $section => $route)
                <x-nav-link
                    href="{{ route($route) }}"
                    :active="request()->routeIs($route)"
                    class="hover:text-gray-300">
                    {{ __($section) }}
                </x-nav-link>
            @endforeach
        </div>
    @endrole


    <!-- farmacia Opciones -->
    @role('farmacia')

    <div class="hidden sm:flex space-x-8">
        @php
            // Definir las secciones y sus respectivas rutas
            $sections = [
                'Inicio' => 'farmacia.index', // Puedes agregar la ruta correspondiente
                'Inventario' => 'farmacia.product.index',
            ];


        @endphp

        @foreach($sections as $section => $route)
            <x-nav-link
                href="{{ route($route) }}"
                :active="request()->routeIs($route)"
                class="hover:text-gray-300">
                {{ __($section) }}
            </x-nav-link>
        @endforeach
    </div>
    @endrole


        <!-- User Dropdown & Actions -->
        <div class="hidden sm:flex sm:items-center space-x-4">

            <!-- Teams Dropdown -->
            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <x-dropdown align="right" width="60">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-transparent hover:text-gray-300 focus:outline-none">
                            {{ Auth::user()->currentTeam->name }}
                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="w-60">
                            <div class="block px-4 py-2 text-xs text-gray-300">
                                {{ __('Manage Team') }}
                            </div>
                            <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ __('Team Settings') }}
                            </x-dropdown-link>
                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-dropdown-link>
                            @endcan
                            @if (Auth::user()->allTeams()->count() > 1)
                                <div class="border-t border-gray-200"></div>
                                <div class="block px-4 py-2 text-xs text-gray-300">
                                    {{ __('Switch Teams') }}
                                </div>
                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-switchable-team :team="$team" />
                                @endforeach
                            @endif
                        </div>
                    </x-slot>
                </x-dropdown>
            @endif


            <!-- Settings Dropdown -->
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                    @else
                        <button class="inline-flex items-center px-3 py-2 border-b-2 border-transparent hover:border-white focus:outline-none focus:border-white">
                            @role('admin') {{ 'Admin: ' . Auth::user()->name }} @endrole
                            @role('doctor') {{ 'Doctor: ' . Auth::user()->name }} @endrole
                            @role('farmacia') {{ 'Farmaceutico: ' . Auth::user()->name }} @endrole
                            @role('cajero') {{ 'Cajero: ' . Auth::user()->name }} @endrole
                            @role('almacenista') {{ 'Almacenista: ' . Auth::user()->name }} @endrole
                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    @endif
                </x-slot>

                <x-slot name="content">
                    <div class="block px-4 py-2 text-xs text-gray-600 text-white">
                        {{ __('Manage Account') }}
                    </div>
                    <x-dropdown-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Perfil') }}
                    </x-dropdown-link>
                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-dropdown-link>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Cerrar Sesión') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>

        <!-- Hamburger Menu for Mobile -->
        <div class="-me-2 flex items-center sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-300 hover:bg-transparent focus:outline-none focus:text-gray-300 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>


    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden"  style="text-align: center;">

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t  border-gray-200"  style="text-align: center;">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 me-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-sans text-base text-white-700">
                        @role('admin')
                            {{ __('Admin') }}: {{  Auth::user()->name }}
                        @endrole

                        @role('doctor')
                            {{ __('Doctor') }}: {{  Auth::user()->name }}
                        @endrole

                        @role('farmacia')
                            {{ __('Farmaceutico') }}: {{  Auth::user()->name }}
                        @endrole

                        @role('cajero')
                            {{ __('Cajero') }}: {{  Auth::user()->name }}
                        @endrole

                        @role('almacenista')
                            {{ __('almacenista') }}: {{  Auth::user()->name }}
                        @endrole
                        @role('socorros')
                            {{ __('Socorros') }}: {{  Auth::user()->name }}
                        @endrole
                    </div>
                </div>

            </div>

            <div   class="mt-3 space-y-1 ">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" class="text-white focus: bg-transparent focus:text-white">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}"
                        :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();" class="text-white">
                        {{ __('Cerrar Sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
