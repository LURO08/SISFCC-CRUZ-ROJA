<style>
    main {
        display: flex;
        justify-content: center;
        width: auto;
        height: 100%;
        padding: 20px;
    }

    @media (max-width: 768px) {
        aside {
            width: 60px;
            padding: 10px;
        }

        #menu .btn .text {
            display: none;
        }

        .btn {
            padding: 10px 5px;
        }

        aside:hover {
            width: 200px;
        }

        aside:hover #menu .btn .text {
            display: block;
        }
    }

    .central {
        flex: 1;
        display: flex;
        justify-content: center;
        text-align: center;
    }

    .card {
        border-radius: 12px;
        overflow: hidden;
    }

    .card-body {
        padding: 2rem;
    }

    .form-select, .form-control {
        border-radius: 8px;
        border: 1px solid #ced4da;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        border-radius: 8px;
        padding: 10px 20px;
        font-size: 1rem;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-radius: 8px;
        padding: 10px 20px;
        font-size: 1rem;
        transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    h2 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }
</style>

@include('admin.menu_nav')

<div class="central">
    <section id="reportes" class="container">
        <h2 class="text-center text-primary mb-4">Generar Reportes</h2>
        <div class="card shadow-lg">
            <div class="card-body">
                <!-- Filtros -->
                <form action="{{ route('admin.reporte.descargar') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <!-- Tipo de Reporte -->
                        <div class="col-md-6">
                            <label for="tipoReporte" class="form-label">Tipo de Reporte</label>
                            <select id="tipoReporte" name="tipo_reporte" class="form-select">
                                <option value="pacientes">Pacientes</option>
                                <option value="medicamentos">Medicamentos</option>
                                <option value="cobros">Cobros</option>
                                <option value="doctores">Doctores</option>
                                <option value="facturas">Facturas</option>
                            </select>
                        </div>

                        <!-- Filtro por Fecha -->
                        <div class="col-md-6">
                            <label for="rangoFecha" class="form-label">Rango de Fecha</label>
                            <select id="rangoFecha" name="rango_fecha" class="form-select">
                                <option value="todos">Todos los registros</option>
                                <option value="desde_fecha">Desde una fecha específica</option>
                                <option value="rango_fechas">Entre fechas</option>
                            </select>
                        </div>
                    </div>

                    <!-- Fechas dinámicas -->
                    <div class="row g-3 mt-3">
                        <div class="col-md-6" id="fechaInicioContainer" style="display: none;">
                            <label for="fechaInicio" class="form-label">Fecha Inicial</label>
                            <input type="date" id="fechaInicio" name="fecha_inicio" class="form-control">
                        </div>
                        <div class="col-md-6" id="fechaFinContainer" style="display: none;">
                            <label for="fechaFin" class="form-label">Fecha Final</label>
                            <input type="date" id="fechaFin" name="fecha_fin" class="form-control">
                        </div>
                    </div>

                    <!-- Opciones Avanzadas -->
                    <div class="mb-3 mt-3">
                        <label for="filtroAvanzado" class="form-label">Filtro Avanzado (opcional)</label>
                        <input type="text" id="filtroAvanzado" name="filtro_avanzado" class="form-control"
                            placeholder="Nombre, ID, o cualquier criterio...">
                    </div>

                    <!-- Botones -->
                    <div class="text-center mt-4" style="display: flex; justify-content: center;">
                        <button style="margin-right: 10px;" type="submit" class="btn btn-primary">
                            <i class="fas fa-file-alt"></i> Generar Reporte
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            <i class="fas fa-eraser"></i> Limpiar Campos
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>

document.addEventListener("DOMContentLoaded", function() {
            const rangoFecha = document.getElementById("rangoFecha");
            const fechaInicioContainer = document.getElementById("fechaInicioContainer");
            const fechaFinContainer = document.getElementById("fechaFinContainer");

            rangoFecha.addEventListener("change", function() {
                if (this.value === "desde_fecha") {
                    // Mostrar solo Fecha Inicial
                    fechaInicioContainer.style.display = "block";
                    fechaFinContainer.style.display = "none";
                } else if (this.value === "rango_fechas") {
                    // Mostrar Fecha Inicial y Fecha Final
                    fechaInicioContainer.style.display = "block";
                    fechaFinContainer.style.display = "block";
                } else {
                    // Ocultar ambos campos
                    fechaInicioContainer.style.display = "none";
                    fechaFinContainer.style.display = "none";
                }
            });
        });
</script>
