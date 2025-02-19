<style>
    .central {
        width: auto;
        padding: 0 20px;
        justify-content: center;
        text-align: center;
    }
</style>

@if (session('success'))
    <div id="successNotification" class="notification alert alert-success alert-dismissible fade show" role="alert"
        style="position: fixed; top: 20px; right: 20px; width: 300px; z-index: 1050;
            background-color: #4CAF50; color: white; border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); padding: 20px; padding-top: 30px; text-align: center;">
        <a type="button" class="btn-close" href=""
            style="position: absolute; top: 10px; right: 10px; font-size: 22px; color: white;
            text-decoration: none; opacity: 0.8;">
            &times;</a>
        <strong>Éxito!</strong> {{ session('success') }}
    </div>
    <script>
        // Oculta la notificación después de 5 segundos (5000 ms)
        setTimeout(() => {
            const notification = document.getElementById('successNotification');
            if (notification) {
                notification.style.transition = "opacity 0.5s ease";
                notification.style.opacity = "0"; // Transición de desvanecimiento
                setTimeout(() => notification.remove(), 500); // Elimina el elemento tras la transición
            }
        }, 3000);
    </script>
@endif

@if (session('error'))
    <div id="successNotification" class="notification alert alert-error alert-dismissible fade show" role="alert"
        style="position: fixed; top: 20px; right: 20px; width: 300px; z-index: 1050;
            background-color: #f63737; color: white; border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); padding: 20px; padding-top: 30px; text-align: center;">
        <a type="button" class="btn-close" href=""
            style="position: absolute; top: 10px; right: 10px; font-size: 22px; color: white;
            text-decoration: none; opacity: 0.8;">
            &times;</a>
        <strong>Error!</strong> {{ session('error') }}
    </div>
    <script>
        // Oculta la notificación después de 5 segundos (5000 ms)
        setTimeout(() => {
            const notification = document.getElementById('successNotification');
            if (notification) {
                notification.style.transition = "opacity 0.5s ease";
                notification.style.opacity = "0"; // Transición de desvanecimiento
                setTimeout(() => notification.remove(), 500); // Elimina el elemento tras la transición
            }
        }, 3000);
    </script>
@endif

@include('admin.menu_nav')


<div class="central" style="font-family: Arial, sans-serif;">



    <!-- Tabla con datos -->
    <div style="margin-top: 20px;">

        <!-- Formulario de descarga -->
    <div style="width: 100%; text-align: center; ">
        <form action="{{ route('guardia.formato.descargar') }}" method="POST"
              style="display: flex; align-items: center; padding: 20px;  ">
            @csrf <!-- Protección CSRF en Laravel -->
            <div style="margin-bottom: 15px; margin: 0 20px; ">
                <label for="dias" style="font-size: 14px;  font-weight: bold; display: block; margin-bottom: 5px; color: #333;">Número de Días:</label>
                <input type="number" name="dias" id="dias"
                       style="width: 100%; padding: 10px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px;"
                       required min="1"  placeholder="Ingrese el número de días">
            </div>
            <div>
                <button type="submit"
                        style="padding: 10px 20px; font-size: 16px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;">
                    Descargar Formato
                </button>
            </div>
        </form>
    </div>

        <table style="width: 100%; border-collapse: collapse; margin: 0 auto; text-align: center; font-size: 14px;">
            <thead>
                <tr style="background-color: #007bff; color: white;">
                    <th style="padding: 10px; border: 1px solid #ddd;">Folio</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Trabajador Solicitante</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Trabajador Suplente</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Fecha</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí puedes insertar filas dinámicamente -->
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;">001</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Juan Pérez</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Carlos Martínez</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">2024-01-20</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;">002</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Ana López</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">Luis Hernández</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">2024-01-22</td>
                </tr>
                <!-- Más filas -->
            </tbody>
        </table>
    </div>

</div>

