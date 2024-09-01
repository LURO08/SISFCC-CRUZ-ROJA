<style>
        /* Estilos para el modal */
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
        background-color: #007bff;
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
        max-height: 90vh;
        overflow-y: auto;
    }

    .modal-dialog {
        width: 500px;

    }

    .modal-dialog .modal-title{
        padding-left: 5px;
    }


    .btn-primary {
        padding: 10px 20px;
        border-radius: 5px;
        color: #fff;
        text-decoration: none;
        cursor: pointer;

    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }


    .btn-primary:hover, {
        opacity: 0.8;
    }

</style>


<header class="text-white p-4">
    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">

        <!-- farmacia -->
        <div class="pt-3 sm:pt-5 bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300">
            <h2 class="text-xl font-semibold text-black">farmacia</h2>
            <p class="mt-4 text-sm text-black">
                Accede al área de farmacia para gestionar inventarios, pedidos y consultas de medicamentos.
            </p>
            <a href="#farmaciaModal" class="inline-block mt-4 px-6 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 transition duration-300">ENTRAR</a>
        </div>

        <!-- Venta -->
        <div class="pt-3 sm:pt-5 bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300">
            <h2 class="text-xl font-semibold text-black">Ventas</h2>
            <p class="mt-4 text-sm text-black">
                Accede al área de Ventas para realizar la gestión de las ventas.
            </p>
            <a href="/cajero" class="inline-block mt-4 px-6 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 transition duration-300">
                ENTRAR
            </a>
        </div>

        <!-- Doctor -->
        <div class="pt-3 sm:pt-5 bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 col-span-2 lg:w-7/10 mx-auto">
            <h2 class="text-xl font-semibold text-black">Doctor</h2>
            <p class="mt-4 text-sm text-black">
                Accede al área de Doctor para consultar expedientes, realizar diagnósticos y gestionar citas.
            </p>
            <a href="{{ route('doctor.index') }}" class="inline-block mt-4 px-6 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 transition duration-300">
                ENTRAR
            </a>
        </div>
    </div>

             <!-- Add Product Modal -->
<div id="farmaciaModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title px-5">farmacia</h5>
            <a href="#" class="close">&times;</a>
        </div>
        <div class="modal-body">
            <div class="pt-3 sm:pt-5 bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300">
                <h2 class="text-xl font-semibold text-black">GESTION DE INVENTARIO</h2>
                <p class="mt-4 text-sm text-black">
                   farmacia
                </p>
                <a href="{{ route('farmacia.product.index') }}" class="inline-block mt-4 px-6 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 transition duration-300">
                    ENTRAR
                </a>
            </div>

            <div class="pt-3 sm:pt-5 bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300">
                <h2 class="text-xl font-semibold text-black">GESTION DE INVENTARIO</h2>
                <p class="mt-4 text-sm text-black">
                   farmacia
                </p>
                <a href="{{ route('farmacia.product.index') }}" class="inline-block mt-4 px-6 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 transition duration-300">
                    ENTRAR
                </a>
            </div>
        </div>
    </div>
</div>



</header>
