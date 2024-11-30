<style>
    :root {
        --primary-blue: #007bff;
    }

    main {
        display: flex;
        justify-content: center;
        width: auto;
        height: 100%;
    }

    .central {
        width: auto;
        padding: 0 20px;
        flex: 1;
        box-sizing: border-box;
        display: flex;
        justify-content: center;
        text-align: center;
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 999;
        justify-content: center;
        align-items: center;
    }

    .modal:target {
        display: flex;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        width: 100%;
        max-width: 600px;
        position: relative;
        justify-content: space-between;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #dee2e6;
        margin-bottom: 15px;

        color: #fff;
    }

    .modal-title {
        font-size: 1.25rem;
        margin: 0;
    }

    .close {
        font-size: 1.5rem;
        color: #fff;
        text-decoration: none;
        cursor: pointer;
        margin-right: 10px;
    }

    .close:hover {
        color: #dcdcdc;
    }

    .modal-body {
        padding: 20px;

    }

    .ModalContenedorDatos {
        max-height: 70vh;
        overflow-y: auto;
    }

    .modal-dialog {
        width: 500px;

    }

    .modal-dialog .modal-title {
        padding-left: 5px;
    }


    .btn-primary {
        padding: 10px 20px;
        border-radius: 5px;
        color: #fff;
        text-decoration: none;
        cursor: pointer;

    }

    .btn-primary:hover,
    {
    opacity: 0.8;
    }

    table {
        width: 80%;
        table-layout: fixed;
    }

    /* Estilos para los botones */
    .btn-edit {
        background-color: #007bff;
        /* Color verde */
        border-color: #007bff;
        color: #fff;
        padding: 10px 12px;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-right: 5px;
    }

    .btn-edit:hover {
        background-color: #2763a4;
        /* Verde más oscuro al pasar el ratón */
    }

    .btn-primary:hover {
        opacity: 0.8;
    }

    .invisible {
        display: none;
        /* This will hide the element completely */
    }
</style>

@if (session('success'))
    <div class="notification alert alert-success alert-dismissible fade show" role="alert"
        style="position: fixed; top: 20px; right: 20px; width: 300px; z-index: 1050; background-color: #4CAF50; color: white; border-radius: 4px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); padding: 15px;">
        <strong>Éxito!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="opacity: 0.8;"></button>
    </div>
@endif

@include('admin.menu_nav')

<div class="central">

    <section id="PanelPersonal">

        <div class=" mx-auto bg-white shadow-md rounded mb-8">
            <div>
                <h2 class="text-center text-3xl font-bold text-gray-700 mb-4">Solicitudes Facturas</h2>
                <div class="flex mb-4 ">

                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full  border border-blue-300">
                        <thead class="bg-blue-500 " style="color:#fff;">
                            <tr>
                                <th class="px-6 py-3 text-center text-sm font-semibold  border-b">
                                    Nombre</th>
                                <th class="px-6 py-3 text-center text-sm font-semibold  border-b">
                                    RFC</th>
                                <th class="px-6 py-3 text-center text-sm font-semibold border-b">
                                    Monto</th>
                                <th class="px-6 py-3 text-center text-sm font-semibold   border-b">
                                    Estatus</th>
                                <th class="px-6 py-3 text-center text-sm font-semibold   border-b">
                                    Cobro Asociado</th>
                                <th class="px-6 py-3 text-center text-sm font-semibold  border-b">
                                    Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitudesFactura as $solicitud)
                                <tr class="hover:bg-gray-200">
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $solicitud->nombre }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $solicitud->rfc }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        ${{ number_format($solicitud->monto, 2) }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        <span
                                            class="px-2 py-1 text-xs font-semibold {{ $solicitud->estatus == 'pendiente' ? 'bg-yellow-100 text-yellow-800' : ($solicitud->estatus == 'procesada' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800') }}">
                                            {{ ucfirst($solicitud->estatus) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        @if ($solicitud->cobro)
                                            {{ $solicitud->cobro->descripcion }} -
                                            ${{ number_format($solicitud->cobro->monto, 2) }}
                                        @else
                                            No asociado
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        <a href="#facturaModal-{{ $solicitud->id }}"
                                            class="btn  text-blue-600 hover:text-white-800 font-semibold text-sm">
                                            Ver
                                        </a>
                                        <a href="#subirfacturaModal-{{ $solicitud->id }}"
                                            class="btn  text-blue-600 hover:text-white-800 font-semibold text-sm">
                                            Subir Factura
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal de Solicitud de Factura -->
                                <div class="modal" id="facturaModal-{{ $solicitud->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style="height: 90vh;">
                                            <div class="bg-blue-500 modal-header">
                                                <h5 class="modal-title text-white">Detalles de la Solicitud de Factura
                                                </h5>
                                                <a href="#" class="close text-white"
                                                    onclick="closeModal('#facturaModal-{{ $solicitud->id }}')">&times;</a>
                                            </div>
                                            <div class="modal-body" style="overflow-y: auto; height: 65vh;">
                                                <h3 class="text-lg font-semibold mb-2">
                                                    Solicitud de Factura de {{ $solicitud->nombre }}
                                                </h3>

                                                <div class="grid grid-cols-2 gap-4">
                                                    <div>
                                                        <strong>RFC:</strong>
                                                        <p>{{ $solicitud->rfc }}</p>
                                                    </div>
                                                    <div>
                                                        <strong>Dirección:</strong>
                                                        <p>{{ $solicitud->direccion }}</p>
                                                    </div>
                                                    <div>
                                                        <strong>Teléfono:</strong>
                                                        <p>{{ $solicitud->telefono }}</p>
                                                    </div>
                                                    <div>
                                                        <strong>Correo:</strong>
                                                        <p>{{ $solicitud->correo }}</p>
                                                    </div>
                                                    <div>
                                                        <strong>Monto:</strong>
                                                        <p>${{ number_format($solicitud->monto, 2) }}</p>
                                                    </div>
                                                    <div>
                                                        <strong>Estatus:</strong>
                                                        <p>{{ ucfirst($solicitud->estatus) }}</p>
                                                    </div>
                                                    <div>
                                                        <strong>Cobro Asociado:</strong>
                                                        <p>{{ $solicitud->cobro->getID() }}</p>
                                                    </div>
                                                    <div>
                                                        <strong>Paciente: </strong>
                                                        <p>{{ $solicitud->cobro->paciente->nombre }}
                                                            {{ $solicitud->cobro->paciente->apellidopaterno }}
                                                            {{ $solicitud->cobro->paciente->apellidomaterno }}</p>
                                                    </div>
                                                    <div>
                                                        <strong>Fecha de Solicitud:</strong>
                                                        <p>{{ $solicitud->created_at->format('d/m/Y H:i') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer flex justify-center w-full"
                                                style="margin-top: 20px;">
                                                <!-- Botón Cancelar -->
                                                <!-- Botón para Descargar PDF -->
                                                <a href="{{ route('admin.factura.download', $solicitud->id) }}"
                                                    class="px-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600"
                                                    target="_blank">
                                                    Descargar PDF
                                                </a>
                                                <a href="#" style="margin-left: 10px;"
                                                    class=" px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600"
                                                    data-dismiss="modal">
                                                    Cerrar
                                                </a>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal" id="subirfacturaModal-{{ $solicitud->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style="height: 65vh;">
                                            <div class="bg-blue-500 modal-header">
                                                <h5 class="modal-title text-white">Detalles de la Solicitud de Factura</h5>
                                                <a href="#" class="close text-white" onclick="closeModal('#subirfacturaModal-{{ $solicitud->id }}')">&times;</a>
                                            </div>
                                            <div class="modal-body" style="overflow-y: auto; height: 60vh;">
                                                <!-- Información sobre la solicitud de factura -->
                                                <div class="mb-4">
                                                    <strong>Folio:</strong> {{ $solicitud->getID() }}<br>
                                                    <strong>Paciente:</strong> {{ $solicitud->cobro->paciente->nombre }} {{ $solicitud->cobro->paciente->apellidopaterno }}<br>
                                                    <strong>Servicio:</strong> {{ $solicitud->cobro->Servicio->nombre }}<br>
                                                    <strong>Fecha de Solicitud:</strong> {{ $solicitud->created_at->format('d/m/Y H:i') }}<br>
                                                    <strong>Estatus:</strong> {{ ucfirst($solicitud->estatus) }}<br>
                                                </div>

                                                <hr>

                                                <!-- Formulario para subir la factura -->
                                                <form action="{{ route('admin.facturas.subir', $solicitud->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group mb-3">
                                                        <label for="factura" class="font-semibold">Subir Factura</label>
                                                        <input type="file" name="factura" class="form-control" accept="application/pdf,image/*" required>
                                                    </div>

                                                    <div class="modal-footer d-flex justify-center w-full mt-4">
                                                        <!-- Botón para subir la factura -->
                                                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Subir Factura</button>

                                                        <a href="#" style="margin-left: 10px;"
                                                        class=" px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600"
                                                        data-dismiss="modal">
                                                        Cerrar
                                                    </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
    </section>
</div>
