{{-- MODALES PAR AGREGAR --}}
<!-- Add Computo Material Modal -->
<div id="addComputoModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title px-5">Agregar Nuevo Material de Computo</h5>
            <a href="#" class="close">&times;</a>
        </div>
        <div class="modal-body-">
            <form method="POST" action="{{ route('almacen.computo.store') }}" enctype="multipart/form-data">
                @csrf
                <div
                    style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; max-height: 70vh; overflow-y: auto;">

                    <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                        <div id="foto-previewMaterialComputo"
                            style="width: 150px; height: 200px; margin-top: 10px; background-color: #fafafa; border: 2px dashed #bbb; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #999; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">
                            <span style="padding: 0 10px;">Seleccione una imagen para la vista previa</span>
                        </div>

                        <input type="file" name="rutaimg" id="btnfotosMedico" class="form-control-file"
                            style="display: none;" onchange="previewImage(this, 'foto-previewMaterialComputo')"
                            accept="image/*">
                        <label for="btnfotosMedico" class="custom-file-upload"
                            style="cursor: pointer; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">
                            Seleccionar Foto
                        </label>
                    </div>


                    <div style="flex: 2; display: flex; flex-direction: column; gap: 15px;">

                        <!-- Campo de Nombre -->
                        <div class="mt-4">
                            <x-label for="nombre" value="{{ __('Nombre') }}" />
                            <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                                pattern="^[A-Za-z\s]{3,50}$" minlength="3" maxlength="50"
                                title="El nombre debe contener entre 3 y 50 caracteres alfabéticos."
                                placeholder="Ejemplo: Laptop HP" :value="old('nombre')" required autocomplete="nombre" />
                        </div>

                        <!-- Campo de Marca -->
                        <div class="mt-4">
                            <x-label for="marca" value="{{ __('Marca') }}" />
                            <x-input id="marca" class="block mt-1 w-full" type="text" name="marca"
                                pattern="^[A-Za-z\s]{3,30}$" minlength="3" maxlength="30"
                                title="La marca debe contener entre 3 y 30 caracteres alfabéticos."
                                placeholder="Ejemplo: HP" required autocomplete="marca" />
                        </div>

                        <!-- Campo de Modelo -->
                        <div class="mt-4">
                            <x-label for="modelo" value="{{ __('Modelo') }}" />
                            <x-input id="modelo" class="block mt-1 w-full" type="text" name="modelo"
                                minlength="2" maxlength="20" title="El modelo debe contener entre 2 y 20 caracteres."
                                placeholder="Ejemplo: Pavilion G6" required autocomplete="modelo" />

                        </div>

                        <!-- Campo de Tipo de Material -->
                        <div class="mt-4">
                            <x-label for="tipo" value="{{ __('Tipo de Material') }}" />
                            <select id="tipo" name="tipo"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50"
                                required>
                                <option value="" disabled selected>Seleccione un tipo</option>
                                <option value="laptop">Laptop</option>
                                <option value="comescritorio">Computadoras de Escritorio</option>
                                <option value="equipored">Equipo de Red</option>
                                <option value="suministroimpresion">Suminitros de impresión</option>
                                <option value="accesorios">Accesorios</option>
                            </select>
                        </div>

                        <!-- Campo de Número de Serie -->
                        <div class="mt-4">
                            <x-label for="numero_serie" value="{{ __('Número de Serie') }}" />
                            <x-input id="numero_serie" class="block mt-1 w-full" type="text" name="numero_serie"
                                pattern="^([A-Za-z0-9\-]{5,20}|[A-Za-z]{5,20}|\d{5,20})$" minlength="5" maxlength="20"
                                title="El número de serie debe contener entre 5 y 20 caracteres alfanuméricos (letras mayúsculas y números)."
                                placeholder="Ejemplo: ABCD-12345" required autocomplete="numero_serie" />
                        </div>

                        <!-- Campo de Cantidad -->
                        <div class="mt-4">
                            <x-label for="cantidad" value="{{ __('Cantidad') }}" />
                            <x-input id="cantidad" class="block mt-1 w-full" type="number" name="cantidad"
                                min="1" max="100" title="La cantidad debe ser un número entre 1 y 100."
                                placeholder="Ejemplo: 5" required autocomplete="cantidad" />
                        </div>

                        <!-- Campo de Estado -->
                        <div class="mt-4">
                            <x-label for="estado" value="{{ __('Estado') }}" />
                            <select id="estado" name="estado"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50"
                                required>
                                <option value="" disabled selected>Seleccione el estado</option>
                                <option value="nuevo">Nuevo</option>
                                <option value="usado">Usado</option>
                                <option value="en_reparacion">En Reparación</option>
                            </select>
                        </div>


                    </div>
                </div>

                <div class="flex items-center justify-center mt-6">
                    <button type="submit"
                        class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                        Agregar
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Add Vehicular Material Modal -->
<div id="addVehicularModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title px-5">Agregar Nuevo Material Vehicular</h5>
            <a href="#" class="close">&times;</a>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('almacen.vehicular.store') }}" enctype="multipart/form-data">
                @csrf

                <div
                    style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; max-height: 70vh; overflow-y: auto;">

                    <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                        <div id="fotopreviewMaterialVehicularadd"
                            style="width: 150px; height: 200px; margin-top: 10px; background-color: #fafafa; border: 2px dashed #bbb; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #999; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">
                            <span style="padding: 0 10px;">Seleccione una imagen para la vista previa</span>
                        </div>

                        <input type="file" name="rutaimg" id="btnfotosvehicularadd" class="form-control-file"
                            style="display: none;" onchange="previewImage(this, 'fotopreviewMaterialVehicularadd')"
                            accept="image/*">
                        <label for="btnfotosvehicularadd" class="custom-file-upload"
                            style="cursor: pointer; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">
                            Seleccionar Foto
                        </label>
                    </div>

                    <div style="flex: 2; display: flex; flex-direction: column; gap: 15px;">

                        <!-- Campo de Marca -->
                        <div class="mt-4">
                            <x-label for="marca" value="{{ __('Marca') }}" />
                            <x-input id="marca" class="block mt-1 w-full" type="text" name="marca"
                                pattern="^[A-Za-z\s]{2,30}$" minlength="2" maxlength="30"
                                title="La marca debe contener entre 2 y 30 caracteres alfabéticos."
                                placeholder="Ejemplo: Toyota" required autocomplete="marca" />
                        </div>

                        <!-- Campo de Modelo -->
                        <div class="mt-4">
                            <x-label for="modelo" value="{{ __('Modelo') }}" />
                            <x-input id="modelo" class="block mt-1 w-full" type="text" name="modelo"
                                pattern="^[A-Za-z0-9\s\-]{2,20}$" minlength="2" maxlength="20"
                                title="El modelo debe contener entre 2 y 20 caracteres alfanuméricos (letras, números y guiones)."
                                placeholder="Ejemplo: Corolla 2023" required autocomplete="modelo" />
                        </div>

                        <!-- Campo de Placa -->
                        <div class="mt-4">
                            <x-label for="placa" value="{{ __('Placa') }}" />
                            <x-input id="placa" class="block mt-1 w-full" type="text" name="placa"
                                pattern="^[A-Z0-9\-]{5,10}$" minlength="5" maxlength="10"
                                title="La placa debe contener entre 5 y 10 caracteres alfanuméricos en mayúsculas (letras, números y guiones)."
                                placeholder="Ejemplo: ABC-123" required autocomplete="placa" />
                        </div>

                        <!-- Campo de Tipo de Vehículo -->
                        <div class="mt-4">
                            <x-label for="tipo" value="{{ __('Tipo de Vehículo') }}" />
                            <select id="tipo" name="tipo"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50"
                                required>
                                <option value="" disabled selected>Selecciona un tipo</option>
                                <option value="ambulancia">Ambulancia</option>
                                <option value="camioneta">Camioneta</option>
                                <option value="auto">Auto</option>
                                <option value="moto">Moto</option>
                                <option value="helicoptero">Helicóptero</option>
                            </select>
                        </div>

                        <!-- Campo de Año -->
                        <div class="mt-4">
                            <x-label for="año" value="{{ __('Año') }}" />
                            <x-input id="año" class="block mt-1 w-full" type="number" name="año"
                                min="1900" max="2100" title="El año debe ser un número entre 1900 y 2100."
                                placeholder="Ejemplo: 2023" required autocomplete="año" />
                        </div>

                        <!-- Campo de Cantidad -->
                        <div class="mt-4">
                            <x-label for="cantidad" value="{{ __('Cantidad') }}" />
                            <x-input id="cantidad" class="block mt-1 w-full" type="number" name="cantidad"
                                min="1" max="100" title="La cantidad debe ser un número entre 1 y 100."
                                placeholder="Ejemplo: 5" required autocomplete="cantidad" />
                        </div>


                        <div class="mt-4">
                            <x-label for="estado" value="{{ __('Estado') }}" />
                            <select id="estado" name="estado"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50"
                                required>
                                <option value="nuevo">Nuevo</option>
                                <option value="usado">Usado</option>
                                <option value="en_reparacion">En Reparación</option>
                                <!-- Agrega más opciones según sea necesario -->
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center mt-6">
                    <button type="submit"
                        class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                        Agregar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Oficina Material Modal -->
<div id="addOficinaModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title px-5">Agregar Nuevo Material de Oficina</h5>
            <a href="#" class="close">&times;</a>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('almacen.oficina.store') }}" enctype="multipart/form-data">
                @csrf

                <div
                    style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; max-height: 70vh; overflow-y: auto;">

                    <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                        <div id="foto-previewMaterialOficina"
                            style="width: 150px; height: 200px; margin-top: 10px; background-color: #fafafa; border: 2px dashed #bbb; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #999; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">
                            <span style="padding: 0 10px;">Seleccione una imagen para la vista previa</span>
                        </div>

                        <input type="file" name="rutaimg" id="btnfotosOficina" class="form-control-file"
                            style="display: none;" onchange="previewImage(this, 'foto-previewMaterialOficina')"
                            accept="image/*">
                        <label for="btnfotosOficina" class="custom-file-upload"
                            style="cursor: pointer; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">
                            Seleccionar Foto
                        </label>
                    </div>

                    <div style="flex: 2; display: flex; flex-direction: column; gap: 15px;">

                        <!-- Campo de Nombre -->
                        <div class="mt-4">
                            <x-label for="nombre" value="{{ __('Nombre') }}" />
                            <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                                pattern="^[A-Za-z\s]{3,50}$" minlength="3" maxlength="50"
                                title="El nombre debe contener entre 3 y 50 caracteres alfabéticos."
                                placeholder="Ejemplo: Escritorio" required autocomplete="nombre" />
                        </div>

                        <!-- Campo de Tipo -->
                        <div class="mt-4">
                            <x-label for="tipo" value="{{ __('Tipo') }}" />
                            <select id="tipo" name="tipo"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50"
                                required>
                                <option value="" disabled selected>Selecciona un tipo</option>
                                <option value="muebles">Muebles</option>
                                <option value="papelería">Papelería</option>
                                <!-- Agrega más opciones según sea necesario -->
                            </select>
                        </div>

                        <!-- Campo de Cantidad -->
                        <div class="mt-4">
                            <x-label for="cantidad" value="{{ __('Cantidad') }}" />
                            <x-input id="cantidad" class="block mt-1 w-full" type="number" name="cantidad"
                                min="1" max="1000" title="La cantidad debe ser un número entre 1 y 1000."
                                placeholder="Ejemplo: 20" required autocomplete="cantidad" />
                        </div>

                        <!-- Campo de Estado -->
                        <div class="mt-4">
                            <x-label for="estado" value="{{ __('Estado') }}" />
                            <select id="estado" name="estado"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50"
                                required>
                                <option value="" disabled selected>Selecciona un estado</option>
                                <option value="nuevo">Nuevo</option>
                                <option value="usado">Usado</option>
                            </select>
                        </div>
                    </div>
                </div>


                        <div class="flex items-center justify-center mt-6">
                            <button type="submit"
                                class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                Agregar
                            </button>
                        </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Medico Material Modal -->
<div id="addMedicoModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title px-5">Agregar Nuevo Material Médico</h5>
            <a href="#" class="close">&times;</a>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('almacen.medico.store') }}" enctype="multipart/form-data">
                @csrf
                <div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 20px;">

                    <!-- Contenedor de la foto -->
                    <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                        <div id="foto-previewMaterialMedico"
                            style="width: 150px; height: 200px; margin-top: 10px; background-color: #fafafa; border: 2px dashed #bbb; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #999; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">
                            <span style="padding: 0 10px;">Seleccione una imagen para la vista previa</span>
                        </div>

                        <input type="file" name="rutaimg" id="btnfotosmedico" class="form-control-file"
                            style="display: none;" onchange="previewImage(this, 'foto-previewMaterialMedico')"
                            accept="image/*" >
                        <label for="btnfotosmedico" class="custom-file-upload"
                            style="cursor: pointer; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">
                            Seleccionar Foto
                        </label>
                    </div>

                    <!-- Contenedor de los campos de entrada -->
                    <div style="flex: 2; display: flex; flex-direction: column; gap: 15px;">
                        <!-- Campo de Nombre -->
                        <div>
                            <x-label for="nombre" value="{{ __('Nombre') }}" />
                            <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                                pattern="^[A-Za-z\s]{3,50}$" minlength="3" maxlength="50"
                                title="El nombre debe contener entre 3 y 50 caracteres alfabéticos."
                                placeholder="Ejemplo: Termómetro" :value="old('nombre')" required autocomplete="nombre" />
                        </div>

                        <!-- Campo de Descripción -->
                        <div>
                            <x-label for="descripcion" value="{{ __('Descripción') }}" />
                            <textarea id="descripcion"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50"
                                name="descripcion" minlength="10" maxlength="300" title="La descripción debe tener entre 10 y 300 caracteres."
                                placeholder="Escribe una breve descripción del material." required autocomplete="descripcion">{{ old('descripcion') }}</textarea>
                        </div>

                        <!-- Campo de Tipo de Material -->
                        <div>
                            <x-label for="tipo" value="{{ __('Tipo de Material') }}" />
                            <select id="tipo" name="tipo"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50"
                                required>
                                <option value="" disabled selected>Selecciona un tipo</option>
                                <option value="quirurgico">Quirúrgico</option>
                                <option value="diagnostico">Diagnóstico</option>
                                <option value="primeros auxilios">Primeros Auxilios</option>
                                <option value="proteccionpersonal">Protección Personal</option>
                            </select>
                        </div>

                        <!-- Campo de Cantidad -->
                        <div>
                            <x-label for="cantidad" value="{{ __('Cantidad') }}" />
                            <x-input id="cantidad" class="block mt-1 w-full" type="number" name="cantidad"
                                min="1" max="1000" title="La cantidad debe ser un número entre 1 y 1000."
                                placeholder="Ejemplo: 20" :value="old('cantidad')" required autocomplete="cantidad" />
                        </div>

                        <!-- Campo de Fecha de Caducidad -->
                        <div>
                            <x-label for="fecha_caducidad" value="{{ __('Fecha de Caducidad') }}" />
                            <x-input id="fecha_caducidad" class="block mt-1 w-full" type="date"
                                name="fecha_caducidad" min="{{ date('Y-m-d') }}"
                                title="Por favor selecciona una fecha válida." placeholder="Selecciona una fecha"
                                :value="old('fecha_caducidad')" required autocomplete="fecha_caducidad" />
                        </div>
                    </div>
                </div>

                        <!-- Botón de envío centrado -->
                        <div class="flex items-center justify-center mt-6">
                            <button type="submit"
                                class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                Agregar
                            </button>
                        </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Limpieza Material Modal -->
<div id="addLimpiezaModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title px-5">Agregar Nuevo Material de Limpieza</h5>
            <a href="#" class="close">&times;</a>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('almacen.limpieza.store') }}" enctype="multipart/form-data">
                @csrf
                <div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 20px;">

                    <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                        <div id="foto-previewMaterialLimpieza"
                            style="width: 150px; height: 200px; margin-top: 10px; background-color: #fafafa; border: 2px dashed #bbb; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #999; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">
                            <span style="padding: 0 10px;">Seleccione una imagen para la vista previa</span>
                        </div>

                        <input type="file" name="rutaimg" id="btnfotoslimpieza" class="form-control-file"
                            style="display: none;" onchange="previewImage(this, 'foto-previewMaterialLimpieza')"
                            accept="image/*">
                        <label for="btnfotoslimpieza" class="custom-file-upload"
                            style="cursor: pointer; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">
                            Seleccionar Foto
                        </label>
                    </div>


                    <div style="flex: 2; display: flex; flex-direction: column; gap: 15px;">
                        <!-- Campo de Artículo -->
                        <div class="mt-4">
                            <x-label for="articulo" value="{{ __('Artículo') }}" />
                            <x-input id="articulo" class="block mt-1 w-full" type="text" name="articulo"
                                pattern="^[A-Za-z\s]{3,50}$" minlength="3" maxlength="50"
                                title="El artículo debe contener entre 3 y 50 caracteres alfabéticos."
                                placeholder="Ejemplo: Escoba" required autocomplete="articulo" />
                        </div>

                        <!-- Campo de Marca -->
                        <div class="mt-4">
                            <x-label for="marca" value="{{ __('Marca') }}" />
                            <x-input id="marca" class="block mt-1 w-full" type="text" name="marca"
                                pattern="^[A-Za-z\s]{3,30}$" minlength="3" maxlength="30"
                                title="La marca debe contener entre 3 y 30 caracteres alfabéticos."
                                placeholder="Ejemplo: Clorox" required autocomplete="marca" />
                        </div>

                        <!-- Campo de Tipo de Material -->
                        <div class="mt-4">
                            <x-label for="tipo" value="{{ __('Tipo de Material') }}" />
                            <select id="tipo" name="tipo"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50"
                                required>
                                <option value="" disabled selected>Seleccione un tipo de material</option>
                                <option value="detergente">Detergente</option>
                                <option value="desinfectante">Desinfectante</option>
                                <option value="cepillo">Cepillo</option>
                                <option value="escoba">Escoba</option>
                                <!-- Agrega más opciones según sea necesario -->
                            </select>
                        </div>

                        <!-- Campo de Presentación -->
                        <div class="mt-4">
                            <x-label for="presentacion" value="{{ __('Presentación') }}" />
                            <select id="presentacion" name="presentacion"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50"
                                required>
                                <option value="" disabled selected>Seleccione una presentación</option>
                                <option value="galon">Galón</option>
                                <option value="botella">Botella</option>
                                <option value="paquete">Paquete</option>
                                <option value="pieza">Pieza</option>
                                <option value="spray">Spray</option>
                                <option value="lata">Lata</option>
                            </select>
                        </div>

                        <!-- Campo de Cantidad -->
                        <div class="mt-4">
                            <x-label for="cantidad" value="{{ __('Cantidad') }}" />
                            <x-input id="cantidad" class="block mt-1 w-full" type="number" name="cantidad"
                                min="1" max="1000" title="La cantidad debe ser un número entre 1 y 1000."
                                placeholder="Ejemplo: 25" required autocomplete="cantidad" />
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center mt-6">
                    <button type="submit"
                        class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                        Agregar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function previewImage(input, previewId) {
        // Verificar si el input y el previewId fueron proporcionados
        if (!input || !previewId) {
            console.error("El input y el previewId son necesarios.");
            return;
        }

        const preview = document.getElementById(previewId);
        const file = input.files[0];

        if (file) {
            // Verificar que el archivo es una imagen
            if (!file.type.startsWith('image/')) {
                preview.innerHTML = 'Por favor, seleccione un archivo de imagen válido.';
                return;
            }
            // Verificar el tamaño del archivo (ejemplo: máximo 5MB)
            const maxSizeMB = 5;
            if (file.size > maxSizeMB * 1024 * 1024) {
                preview.innerHTML = `La imagen es demasiado grande. Máximo permitido: ${maxSizeMB}MB.`;
                return;
            }

            const reader = new FileReader();
            reader.onloadend = function() {
                preview.innerHTML = '<img src="' + reader.result +
                    '" class="img-thumbnail" style="width: 100%; height: 100%; max-width: 100%; max-height: 100%; border-radius: 8px;" />';
            };
            reader.onerror = function() {
                console.error("Error al leer el archivo.");
                preview.innerHTML = 'Error al cargar la imagen. Intente nuevamente.';
            };
            reader.readAsDataURL(file);
        } else {
            preview.innerHTML = 'No se ha seleccionado ninguna imagen';
        }
    }
</script>
