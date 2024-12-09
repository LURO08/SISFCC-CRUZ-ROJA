<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/almacen.css'])
    @vite(['resources/css/modal.css'])
    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @include('almacen.menu_nav')

            <div class="container">
                @if ($category)
                    <h1>Inventario de {{ ucfirst($category) }}</h1>
                    <!-- Tablas de inventario por categoría -->
                    <br>
                    <a href="#add{{ ucfirst($category) }}Modal"
                        class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">
                        Agregar item {{ ucfirst($category) }}</a>

                    <a href="{{ route('almacen.' . strtolower($category) . '.pdf') }}"
                        class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">
                        Generar Reporte {{ ucfirst($category) }}
                    </a>



                    @if ($category == 'vehicular')
                        <table>
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Clave</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Placa</th>
                                    <th>Año</th>
                                    <th>Cantidad</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($vehicularItems as $item)
                                    <tr>
                                        <td>
                                            @if ($item->rutaimg)
                                                <div>
                                                    <img src="{{ asset($item->rutaimg) }}" alt="{{ $item->nombre }}"
                                                        class="img-fluid" width="100px">
                                                </div>
                                            @else
                                                <span>No hay fotos</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->marca }}</td>
                                        <td>{{ $item->modelo }}</td>
                                        <td>{{ $item->placa }}</td>
                                        <td>{{ $item->año }}</td>
                                        <td>{{ $item->cantidad }}</td>
                                        <td>{{ $item->estado }}</td>

                                        <td class="items-center space-x-2">
                                            <a href="#Edit{{ ucfirst($category) }}Modal-{{ $item->id }}"
                                                class="inline-block px-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">Editar</a>
                                            <form action="{{ route('almacen.vehicular.destroy', $item->id) }}"
                                                method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-block px-4 py-2 bg-red-500 text-white font-semibold rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Edit Vehicular item Modal -->
                                    <div id="EditVehicularModal-{{ $item->id }}" class="modal">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title px-5">Editar item Vehicular</h5>
                                                <a href="#" class="close">&times;</a>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="{{ route('almacen.vehicular.update', $item->id) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div
                                                        style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; max-height: 70vh; overflow-y: auto;">

                                                        <div
                                                            style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                                                            <!-- Vista previa de la imagen cargada -->
                                                            <div id="fotopreviewMaterialVehicular"
                                                                style="width: 150px; height: 200px; margin-top: 10px; background-color: #fafafa; border: 2px dashed #bbb; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #999; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">
                                                                <span id="imagePreviewText" style="padding: 0 10px;">
                                                                    @if ($item->rutaimg)
                                                                        <!-- Si ya hay una imagen, mostrarla -->
                                                                        <img src="{{ asset($item->rutaimg) }}"
                                                                            alt="Imagen del Vehículo"
                                                                            style="max-width: 100%; max-height: 100%; object-fit: cover; border-radius: 8px;">
                                                                    @else
                                                                        <!-- Texto de vista previa si no hay imagen cargada -->
                                                                        Seleccione una imagen para la vista previa
                                                                    @endif
                                                                </span>
                                                            </div>

                                                            <!-- Campo de carga de imagen -->
                                                            <input type="file" name="rutaimg" id="btnfotosVehicular"
                                                                class="form-control-file" style="display: none;"
                                                                onchange="previewImage(this, 'fotopreviewMaterialVehicular')"
                                                                accept="image/*">

                                                            <!-- Etiqueta para seleccionar una nueva foto -->
                                                            <label for="btnfotosVehicular" class="custom-file-upload"
                                                                style="cursor: pointer; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">
                                                                Seleccionar Foto
                                                            </label>
                                                        </div>


                                                        <div
                                                            style="flex: 2; display: flex; flex-direction: column; gap: 15px;">
                                                            <div class="mt-4">
                                                                <x-label for="marca" value="Marca" />
                                                                <x-input id="marca" class="block mt-1 w-full"
                                                                    type="text" name="marca" :value="$item->marca"
                                                                    required />
                                                            </div>
                                                            <div class="mt-4">
                                                                <x-label for="modelo" value="Modelo" />
                                                                <x-input id="modelo" class="block mt-1 w-full"
                                                                    type="text" name="modelo" :value="$item->modelo"
                                                                    required />
                                                            </div>
                                                            <div class="mt-4">
                                                                <x-label for="placa" value="Placa" />
                                                                <x-input id="placa" class="block mt-1 w-full"
                                                                    type="text" name="placa" :value="$item->placa"
                                                                    required />
                                                            </div>
                                                            <div class="mt-4">
                                                                <x-label for="año" value="Año" />
                                                                <x-input id="año" class="block mt-1 w-full"
                                                                    type="number" name="año" :value="$item->año"
                                                                    required />
                                                            </div>
                                                            <div class="mt-4">
                                                                <x-label for="cantidad" value="Cantidad" />
                                                                <x-input id="cantidad" class="block mt-1 w-full"
                                                                    type="number" name="cantidad" :value="$item->cantidad"
                                                                    required />
                                                            </div>
                                                            <div class="mt-4">
                                                                <x-label for="estado" value="Estado" />
                                                                <x-input id="estado" class="block mt-1 w-full"
                                                                    type="text" name="estado" :value="$item->estado"
                                                                    required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="flex items-center justify-center mt-6">
                                                        <button
                                                            class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-opacity-50">
                                                            Actualizar
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="9" class="no-data">No hay itemes en esta categoría.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @elseif ($category == 'medico')
                        <table>
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Tipo</th>
                                    <th>Cantidad</th>
                                    <th>fecha_caducidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($medicoItems as $item)
                                    <tr>
                                        <td>
                                            @if ($item->rutaimg)
                                                <div>
                                                    <img src="{{ asset($item->rutaimg) }}" alt="{{ $item->nombre }}"
                                                        class="img-fluid" width="100px">
                                                </div>
                                            @else
                                                <span>No hay fotos</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->descripcion }}</td>
                                        <td>{{ $item->tipo }}</td>
                                        <td>{{ $item->cantidad }}</td>
                                        <td>{{ $item->fecha_caducidad }}</td>
                                        <td class="items-center space-x-2">
                                            <a href="#Edit{{ ucfirst($category) }}Modal-{{ $item->id }}"
                                                class="inline-block px-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">Editar</a>
                                            <form action="{{ route('almacen.medico.destroy', $item->id) }}"
                                                method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-block px-4 py-2 bg-red-500 text-white font-semibold rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- Edit Medico item Modal -->

                                    <div id="EditMedicoModal-{{ $item->id }}" class="modal">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title px-5">Editar item Médico</h5>
                                                <a href="#" class="close">&times;</a>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="{{ route('almacen.medico.update', $item->id) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')

                                                    <div
                                                        style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">

                                                        <div
                                                            style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                                                            <!-- Vista previa de la imagen cargada -->
                                                            <div id="fotopreviewMaterialVehicular"
                                                                style="width: 150px; height: 200px; margin-top: 10px; background-color: #fafafa; border: 2px dashed #bbb; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #999; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">
                                                                <span id="imagePreviewText" style="padding: 0 10px;">
                                                                    @if ($item->rutaimg)
                                                                        <!-- Si ya hay una imagen, mostrarla -->
                                                                        <img src="{{ asset($item->rutaimg) }}"
                                                                            alt="Imagen del Vehículo"
                                                                            style="max-width: 100%; max-height: 100%; object-fit: cover; border-radius: 8px;">
                                                                    @else
                                                                        <!-- Texto de vista previa si no hay imagen cargada -->
                                                                        Seleccione una imagen para la vista previa
                                                                    @endif
                                                                </span>
                                                            </div>

                                                            <!-- Campo de carga de imagen -->
                                                            <input type="file" name="rutaimg"
                                                                id="btnfotosVehicular" class="form-control-file"
                                                                style="display: none;"
                                                                onchange="previewImage(this, 'fotopreviewMaterialVehicular')"
                                                                accept="image/*">

                                                            <!-- Etiqueta para seleccionar una nueva foto -->
                                                            <label for="btnfotosVehicular" class="custom-file-upload"
                                                                style="cursor: pointer; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">
                                                                Seleccionar Foto
                                                            </label>
                                                        </div>


                                                        <div
                                                            style="flex: 2; display: flex; flex-direction: column; gap: 15px;">
                                                            <div class="mt-4">
                                                                <x-label for="nombre" value="Nombre" />
                                                                <x-input id="nombre" class="block mt-1 w-full"
                                                                    type="text" name="nombre" :value="$item->nombre"
                                                                    required />
                                                            </div>
                                                            <div class="mt-4">
                                                                <x-label for="descripcion" value="Descripción" />
                                                                <textarea id="descripcion" name="descripcion" class="block mt-1 w-full" value="">{{ $item->descripcion }}</textarea>
                                                            </div>
                                                            <div class="mt-4">
                                                                <x-label for="tipo" value="Tipo" />
                                                                <x-input id="tipo" class="block mt-1 w-full"
                                                                    type="text" name="tipo" :value="$item->tipo"
                                                                    required />
                                                            </div>
                                                            <div class="mt-4">
                                                                <x-label for="cantidad" value="Cantidad" />
                                                                <x-input id="cantidad" class="block mt-1 w-full"
                                                                    type="number" name="cantidad" :value="$item->cantidad"
                                                                    required />
                                                            </div>
                                                            <div class="mt-4">
                                                                <x-label for="fecha_caducidad"
                                                                    value="Fecha de caducidad" />
                                                                <x-input id="fecha_caducidad"
                                                                    class="block mt-1 w-full" type="date"
                                                                    name="fecha_caducidad" :value="$item->fecha_caducidad"
                                                                    required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="flex items-center justify-center mt-6">
                                                        <button type="submit"
                                                            class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-opacity-50">
                                                            Actualizar
                                                        </button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="8" class="no-data">No hay itemes en esta categoría.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @elseif ($category == 'oficina')
                        <table>
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Cantidad</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($oficinaItems as $item)
                                    <tr>
                                        <td>
                                            @if ($item->rutaimg)
                                                <div>
                                                    <img src="{{ asset($item->rutaimg) }}" alt="{{ $item->nombre }}"
                                                        class="img-fluid" width="100px">
                                                </div>
                                            @else
                                                <span>No hay fotos</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->tipo }}</td>
                                        <td>{{ $item->cantidad }}</td>
                                        <td>{{ $item->estado }}</td>
                                        <td class=" justify-center items-center space-x-4">
                                            <!-- Botón de Editar -->
                                            <a href="#Edit{{ ucfirst($category) }}Modal-{{ $item->id }}"
                                                class="px-6 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300 transition duration-200 ease-in-out">
                                                Editar
                                            </a>

                                            <!-- Formulario para Eliminar -->
                                            <form action="{{ route('almacen.oficina.destroy', $item->id) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-6 py-2 bg-red-500 text-white font-semibold rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200 ease-in-out">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>


                                    <!-- Edit Oficina item Modal -->
                                    <div id="EditOficinaModal-{{ $item->id }}" class="modal">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title px-5">Editar item de Oficina</h5>
                                                <a href="#" class="close">&times;</a>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="{{ route('almacen.oficina.update', $item->id) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')

                                                    <div
                                                        style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">

                                                        <div
                                                            style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                                                            <!-- Vista previa de la imagen cargada -->
                                                            <div id="fotopreviewMaterialoficina"
                                                                style="width: 150px; height: 200px; margin-top: 10px; background-color: #fafafa; border: 2px dashed #bbb; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #999; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">
                                                                <span id="imagePreviewText" style="padding: 0 10px;">
                                                                    @if ($item->rutaimg)
                                                                        <!-- Si ya hay una imagen, mostrarla -->
                                                                        <img src="{{ asset($item->rutaimg) }}"
                                                                            alt="Imagen del Vehículo"
                                                                            style="max-width: 100%; max-height: 100%; object-fit: cover; border-radius: 8px;">
                                                                    @else
                                                                        <!-- Texto de vista previa si no hay imagen cargada -->
                                                                        Seleccione una imagen para la vista previa
                                                                    @endif
                                                                </span>
                                                            </div>

                                                            <!-- Campo de carga de imagen -->
                                                            <input type="file" name="rutaimg"
                                                                id="btnfotosoficinamodify" class="form-control-file"
                                                                style="display: none;"
                                                                onchange="previewImage(this, 'fotopreviewMaterialoficina')"
                                                                accept="image/*">

                                                            <!-- Etiqueta para seleccionar una nueva foto -->
                                                            <label for="btnfotosoficinamodify"
                                                                class="custom-file-upload"
                                                                style="cursor: pointer; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">
                                                                Seleccionar Foto
                                                            </label>
                                                        </div>

                                                        <div
                                                            style="flex: 2; display: flex; flex-direction: column; gap: 15px;">
                                                            <div class="mt-4">
                                                                <x-label for="nombre"
                                                                    value="{{ __('Nombre') }}" />
                                                                <x-input id="nombre" class="block mt-1 w-full"
                                                                    type="text" name="nombre" :value="$item->nombre"
                                                                    required autocomplete="nombre" />
                                                            </div>

                                                            <div class="mt-4">
                                                                <x-label for="tipo"
                                                                    value="{{ __('Tipo') }}" />
                                                                <select id="tipo" name="tipo"
                                                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-500 focus:ring-opacity-50"
                                                                    required>
                                                                    <option value="muebles"
                                                                        {{ $item->tipo == 'muebles' ? 'selected' : '' }}>
                                                                        Muebles</option>
                                                                    <option value="papelería"
                                                                        {{ $item->tipo == 'papelería' ? 'selected' : '' }}>
                                                                        Papelería</option>
                                                                    <!-- Agrega más opciones según sea necesario -->
                                                                </select>
                                                            </div>

                                                            <div class="mt-4">
                                                                <x-label for="cantidad"
                                                                    value="{{ __('Cantidad') }}" />
                                                                <x-input id="cantidad" class="block mt-1 w-full"
                                                                    type="number" name="cantidad" :value="$item->cantidad"
                                                                    required autocomplete="cantidad" />
                                                            </div>

                                                            <div class="mt-4">
                                                                <x-label for="estado"
                                                                    value="{{ __('Estado') }}" />
                                                                <select id="estado" name="estado"
                                                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-500 focus:ring-opacity-50"
                                                                    required>
                                                                    <option value="nuevo"
                                                                        {{ $item->estado == 'nuevo' ? 'selected' : '' }}>
                                                                        Nuevo
                                                                    </option>
                                                                    <option value="usado"
                                                                        {{ $item->estado == 'usado' ? 'selected' : '' }}>
                                                                        Usado
                                                                    </option>
                                                                    <option value="en_reparacion"
                                                                        {{ $item->estado == 'en_reparacion' ? 'selected' : '' }}>
                                                                        En Reparación</option>
                                                                    <option value="descontinuado"
                                                                        {{ $item->estado == 'descontinuado' ? 'selected' : '' }}>
                                                                        Descontinuado</option>
                                                                    <!-- Agrega más opciones según sea necesario -->
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center justify-center mt-6">
                                                        <button
                                                            class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-opacity-50">
                                                            Actualizar
                                                        </button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="7" class="no-data">No hay itemes en esta categoría.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @elseif ($category == 'computo')
                        <table>
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Tipo</th>
                                    <th>Numero Serie</th>
                                    <th>Cantidad</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($computoItems as $item)
                                    <tr>
                                        <td>
                                            @if ($item->rutaimg)
                                                <div>
                                                    <img src="{{ asset($item->rutaimg) }}" alt="{{ $item->nombre }}"
                                                        class="img-fluid" width="100px">
                                                </div>
                                            @else
                                                <span>No hay fotos</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->marca }}</td>
                                        <td>{{ $item->modelo }}</td>
                                        <td>
                                            @switch($item->tipo)
                                                @case('laptop')
                                                    Laptop
                                                @break

                                                @case('comescritorio')
                                                    Computadora de Escritorio
                                                @break

                                                @case('equipored')
                                                    Equipo de Red
                                                @break

                                                @case('suministroimpresion')
                                                    Suministros de impresión
                                                @break

                                                @case('accesorios')
                                                    Accesorios
                                                @break

                                                @default
                                                    Otro Tipo de Material
                                            @endswitch
                                        </td>

                                        <td>{{ $item->numero_serie }}</td>
                                        <td>{{ $item->cantidad }}</td>
                                        <td>
                                            @switch($item->estado)
                                                @case('nuevo')
                                                    Nuevo
                                                @break

                                                @case('usado')
                                                    Usado
                                                @break

                                                @case('en_reparacion')
                                                    En Reparación
                                                @break
                                            @endswitch
                                        </td>
                                        <td  class=" items-center space-x-4 ">

                                            <div style="display: flex;">
                                                    <!-- Botón Editar -->
                                                    <a href="#Edit{{ ucfirst($category) }}Modal-{{ $item->id }}"
                                                        class="px-4 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300 transition-colors duration-300">
                                                        Editar
                                                    </a>

                                                        <!-- Formulario para Eliminar -->
                                                        <form action="{{ route('almacen.computo.destroy', $item->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este ítem?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                            style="margin-left: 10px;"
                                                                class="px-4 py-2 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300 transition-colors duration-300">
                                                                Eliminar
                                                            </button>
                                                        </form>
                                            </div>

                                        </td>


                                    </tr>
                                    <!-- Edit item item Modal -->
                                    <div id="EditComputoModal-{{ $item->id }}" class="modal">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title px-5">Editar item de computo</h5>
                                                <a href="#" class="close">&times;</a>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="{{ route('almacen.computo.update', $item->id) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div
                                                        style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; max-height: 70vh; overflow-y: auto;">

                                                        <div
                                                            style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                                                            <!-- Vista previa de la imagen cargada -->
                                                            <div id="fotopreviewMaterialcomputomodify"
                                                                style="width: 150px; height: 200px; margin-top: 10px; background-color: #fafafa; border: 2px dashed #bbb; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #999; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">
                                                                <span id="imagePreviewText" style="padding: 0 10px;">
                                                                    @if ($item->rutaimg)
                                                                        <!-- Si ya hay una imagen, mostrarla -->
                                                                        <img src="{{ asset($item->rutaimg) }}"
                                                                            alt="Imagen del Vehículo"
                                                                            style="max-width: 100%; max-height: 100%; object-fit: cover; border-radius: 8px;">
                                                                    @else
                                                                        <!-- Texto de vista previa si no hay imagen cargada -->
                                                                        Seleccione una imagen para la vista previa
                                                                    @endif
                                                                </span>
                                                            </div>

                                                            <!-- Campo de carga de imagen -->
                                                            <input type="file" name="rutaimg"
                                                                id="btnfotocomputomodify" class="form-control-file"
                                                                style="display: none;"
                                                                onchange="previewImage(this, 'fotopreviewMaterialcomputomodify')"
                                                                accept="image/*">

                                                            <!-- Etiqueta para seleccionar una nueva foto -->
                                                            <label for="btnfotocomputomodify"
                                                                class="custom-file-upload"
                                                                style="cursor: pointer; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">
                                                                Seleccionar Foto
                                                            </label>
                                                        </div>

                                                        <div
                                                            style="flex: 2; display: flex; flex-direction: column; gap: 15px;">
                                                            <div class="mt-4">
                                                                <x-label for="nombre"
                                                                    value="{{ __('Nombre') }}" />
                                                                <x-input id="nombre" class="block mt-1 w-full"
                                                                    type="text" name="nombre" :value="$item->nombre"
                                                                    required autocomplete="nombre" />
                                                            </div>

                                                            <div class="mt-4">
                                                                <x-label for="marca"
                                                                    value="{{ __('Marca') }}" />
                                                                <x-input id="marca" class="block mt-1 w-full"
                                                                    type="text" name="marca" :value="$item->marca"
                                                                    required autocomplete="marca" />
                                                            </div>

                                                            <div class="mt-4">
                                                                <x-label for="modelo"
                                                                    value="{{ __('Modelo') }}" />
                                                                <x-input id="modelo" class="block mt-1 w-full"
                                                                    type="text" name="modelo" :value="$item->modelo"
                                                                    required autocomplete="modelo" />
                                                            </div>

                                                            <div class="mt-4">
                                                                <x-label for="tipo"
                                                                    value="{{ __('Tipo de Material') }}" />
                                                                <select id="tipo" name="tipo"
                                                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-500 focus:ring-opacity-50"
                                                                    required>
                                                                    <option value="laptop">Laptop</option>
                                                                    <option value="comescritorio">Computadoras de
                                                                        Escritorio
                                                                    </option>
                                                                    <option value="equipored">Equipo de Red</option>
                                                                    <option value="suministroimpresion">Suminitros de
                                                                        impresión
                                                                    </option>
                                                                    <option value="accesorios">Accesorios</option>
                                                                </select>
                                                            </div>


                                                            <div class="mt-4">
                                                                <x-label for="numero_serie"
                                                                    value="{{ __('Número de Serie') }}" />
                                                                <x-input id="numero_serie" class="block mt-1 w-full"
                                                                    type="text" name="numero_serie"
                                                                    :value="$item->numero_serie" required
                                                                    autocomplete="numero_serie" />
                                                            </div>

                                                            <div class="mt-4">
                                                                <x-label for="cantidad"
                                                                    value="{{ __('Cantidad') }}" />
                                                                <x-input id="cantidad" class="block mt-1 w-full"
                                                                    type="number" name="cantidad" :value="$item->cantidad"
                                                                    required autocomplete="cantidad" />
                                                            </div>

                                                            <div class="mt-4">
                                                                <x-label for="estado"
                                                                    value="{{ __('Estado') }}" />
                                                                <select id="estado" name="estado"
                                                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-500 focus:ring-opacity-50"
                                                                    required>
                                                                    <option value="nuevo"
                                                                        {{ $item->estado == 'nuevo' ? 'selected' : '' }}>
                                                                        Nuevo
                                                                    </option>
                                                                    <option value="usado"
                                                                        {{ $item->estado == 'usado' ? 'selected' : '' }}>
                                                                        Usado
                                                                    </option>
                                                                    <option value="en_reparacion"
                                                                        {{ $item->estado == 'en_reparacion' ? 'selected' : '' }}>
                                                                        En Reparación</option>
                                                                    <!-- Agrega más opciones según sea necesario -->
                                                                </select>
                                                            </div>



                                                            <div class="flex items-center justify-center mt-6">
                                                                <button
                                                                    class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-opacity-50">
                                                                    Actualizar
                                                                </button>
                                                            </div>
                                                            <div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="no-data">No hay itemes en esta categoría.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        @elseif ($category == 'limpieza')
                            <table>
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Clave</th>
                                        <th>Articulo</th>
                                        <th>Marca</th>
                                        <th>Tipo</th>
                                        <th>Presentacion</th>
                                        <th>Cantidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($limpiezaItems as $item)
                                        <tr>
                                            <td>
                                                @if ($item->rutaimg)
                                                    <div>
                                                        <img src="{{ asset($item->rutaimg) }}" alt="{{ $item->nombre }}"
                                                            class="img-fluid" width="100px">
                                                    </div>
                                                @else
                                                    <span>No hay fotos</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->articulo }}</td>
                                            <td>{{ $item->marca }}</td>
                                            <td>{{ $item->tipo }}</td>
                                            <td>{{ $item->presentacion }}</td>
                                            <td>{{ $item->cantidad }}</td>
                                            <td class=" items-center space-x-2">
                                                <a href="#EditLimpiezaModal-{{ $item->id }}"
                                                    class="inline-block px-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">Editar</a>
                                                <form action="{{ route('almacen.limpieza.destroy', $item->id) }}"
                                                    method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-block px-4 py-2 bg-red-500 text-white font-semibold rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- Edit limpieza item Modal -->
                                        <div id="EditLimpiezaModal-{{ $item->id }}" class="modal">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title px-5">Editar Material de Limpieza</h5>
                                                    <a href="#" class="close">&times;</a>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST"
                                                        action="{{ route('almacen.limpieza.update', ['id' => $item->id]) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div
                                                            style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">

                                                            <div
                                                                style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                                                                <!-- Vista previa de la imagen cargada -->
                                                                <div id="fotopreviewMateriallimpiezamodify"
                                                                    style="width: 150px; height: 200px; margin-top: 10px; background-color: #fafafa; border: 2px dashed #bbb; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #999; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">
                                                                    <span id="imagePreviewText" style="padding: 0 10px;">
                                                                        @if ($item->rutaimg)
                                                                            <!-- Si ya hay una imagen, mostrarla -->
                                                                            <img src="{{ asset($item->rutaimg) }}"
                                                                                alt="Imagen del Vehículo"
                                                                                style="max-width: 100%; max-height: 100%; object-fit: cover; border-radius: 8px;">
                                                                        @else
                                                                            <!-- Texto de vista previa si no hay imagen cargada -->
                                                                            Seleccione una imagen para la vista previa
                                                                        @endif
                                                                    </span>
                                                                </div>

                                                                <!-- Campo de carga de imagen -->
                                                                <input type="file" name="rutaimg"
                                                                    id="btnfotolimpiezamodify" class="form-control-file"
                                                                    style="display: none;"
                                                                    onchange="previewImage(this, 'fotopreviewMateriallimpiezamodify')"
                                                                    accept="image/*">

                                                                <!-- Etiqueta para seleccionar una nueva foto -->
                                                                <label for="btnfotolimpiezamodify"
                                                                    class="custom-file-upload"
                                                                    style="cursor: pointer; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">
                                                                    Seleccionar Foto
                                                                </label>
                                                            </div>

                                                            <div
                                                                style="flex: 2; display: flex; flex-direction: column; gap: 15px;">
                                                                <div class="mt-4">
                                                                    <x-label for="articulo"
                                                                        value="{{ __('Articulo') }}" />
                                                                    <x-input id="articulo" class="block mt-1 w-full"
                                                                        type="text" name="articulo"
                                                                        value="{{ $item->articulo }}" required
                                                                        autocomplete="articulo" />
                                                                </div>

                                                                <div class="mt-4">
                                                                    <x-label for="marca"
                                                                        value="{{ __('Marca') }}" />
                                                                    <x-input id="marca" class="block mt-1 w-full"
                                                                        type="text" name="marca"
                                                                        value="{{ $item->marca }}" required
                                                                        autocomplete="Marca" />
                                                                </div>

                                                                <div class="mt-4">
                                                                    <x-label for="presentacion" value="{{ __('Presentación') }}" />
                                                                    <select id="presentacion" name="presentacion" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-500 focus:ring-opacity-50" required>
                                                                        <option value="bulto" {{ $item->presentacion == 'bulto' ? 'selected' : '' }}>Bulto</option>
                                                                        <option value="botella" {{ $item->presentacion == 'botella' ? 'selected' : '' }}>Botella</option>
                                                                        <option value="paquete" {{ $item->presentacion == 'paquete' ? 'selected' : '' }}>Paquete</option>
                                                                        <option value="unidad" {{ $item->presentacion == 'unidad' ? 'selected' : '' }}>Unidad</option>
                                                                    </select>
                                                                </div>


                                                                <div class="mt-4">
                                                                    <x-label for="presentacion"
                                                                        value="{{ __('Presentacion') }}" />
                                                                    <x-input id="presentacion" class="block mt-1 w-full"
                                                                        type="text" name="presentacion"
                                                                        value="{{ $item->presentacion }}" required
                                                                        autocomplete="presentacion" />
                                                                </div>

                                                                <div class="mt-4">
                                                                    <x-label for="cantidad"
                                                                        value="{{ __('Cantidad') }}" />
                                                                    <x-input id="cantidad" class="block mt-1 w-full"
                                                                        type="number" name="cantidad"
                                                                        value="{{ $item->cantidad }}" required
                                                                        autocomplete="cantidad" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="flex items-center justify-center mt-6">
                                                            <button
                                                                class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-opacity-50">
                                                                Guardar Cambios
                                                            </button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    @empty
                                        <tr>
                                            <td colspan="9" class="no-data">No hay items en esta categoría.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        @endif
                    @else
                        <p>Selecciona una categoría para ver el inventario.</p>
                    @endif
                </div>


                @include('almacen.modals.modal');





            </main>
        </div>

        @livewireScripts
    </body>

    </html>
