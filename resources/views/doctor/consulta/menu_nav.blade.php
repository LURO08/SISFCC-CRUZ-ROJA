<style>
    :root {
      --primary-color: #007bff;
      --hover-color: #0056b3;
      --text-color: #fff;
      --background-color: #f4f4f4;
  }

   main {
      display: flex;
      justify-content: center;
      width: auto;
      height: 100%;
  }

      /* Css Menu de opciones Aside*/
      aside {
      width: 16%;
      background-color: var(--background-color);
      padding: 20px;
      height: 100vh;
      box-sizing: border-box;
      border-right: 2px solid #6c757d;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      transition: width 0.3s ease;
      position: relative;
  }

  .toggle {
      text-align: center;
      width: 100%;
      justify-content: center;
      font-size: 30px;
  }

  #menu {
      list-style-type: none;
      padding: 0;
      margin: 0;
  }

  #menu li {
      margin-bottom: 10px;
  }

  .btn {
      display: flex;
      align-items: center;
      padding: 10px;
      margin-bottom: 10px;
      background-color: var(--primary-color);
      color: var(--text-color);
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s, padding 0.3s;
      justify-content: center;
  }

  .btn:hover {
      background-color: var(--hover-color);
  }

  .collapse-btn {
      position: absolute;
      top: 10px;
      left: 10px;
      background-color: transparent;
      border: none;
      font-size: 20px;
      cursor: pointer;
      color: var(--primary-color);
      transition: color 0.3s;
  }

  .collapse-btn:hover {
      color: var(--hover-color);
  }

   /* Ocultar secciones inicialmente */
   .section {
      display: none;
  }

  /* Mostrar la sección activa */
  .section.active {
      display: block;
  }

  @media (max-width: 768px) {
      aside {
          width: 60px;
          padding: 10px;
      }

      #menu .btn .text {
          display: none;
          /* Ocultar el menú principal en móviles */
      }

      .btn {
          padding: 10px 5px;
          /* Ajustar tamaño del botón en móviles */
      }

      aside:hover {
          width: 200px;
      }

      aside:hover #menu .btn .text {
          display: block;
      }
  }

  .collapsed {
      display: none;
  }

  /* Estilos para la parte central */
  .central {
      width: auto;
      padding: 0 20px;
      flex: 1;
      box-sizing: border-box;
      display: flex;
      justify-content: center;
      text-align: center;
  }


        .modalAddPaciente .modal-content{
            max-width: 450px;
        }


        .modal input {
            width: 100%;
        }

        .modal select {
            width: 100%;
        }
</style>

<link rel="stylesheet" href="{{ asset('css/component/modal.css') }}">


<aside id="aside">
    <div class="toggle" onclick="toggleMenu()">
        <span class="icon" id="icon">⬅️</span> <!-- Icono del menú (hamburguesa) -->
    </div>
    <ul id="menu" class="collapsed">
        <li>
            <a class="btn" href="{{route('doctor.index')}}" id="home">
                <span class="icon">🏠</span>
                <span class="text" style="font-weight: bold;">Home</span>
            </a>
        </li>
        <li>
            <a class="btn" href="{{route('doctor.recetas.view')}}" id="recipes">
                <span class="icon">🍽️</span>
                <span class="text">Ver Recetas</span>
            </a>
        </li>
        <li>
            <a href="#modalAddPaciente" class="btn">
                <span class="icon">👥</span>
                <span class="text">Nuevo Paciente</span>
            </a>
        </li>
        <li>
            <a href="{{route('doctor.receta.index')}}" class="btn">
                <span class="icon">➕</span>
                <span class="text">Añadir Consulta</span>
            </a>
        </li>
    </ul>
</aside>

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


    <!-- Add Patient Modal -->
    <div id="modalAddPaciente" class="modal modalAddPaciente">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Nuevo Paciente</h5>
                <a href="" class="close">&times;</a>
            </div>
            <div class="modal-body">
                <form action="{{ route('doctor.pacientes.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <!-- Columna para los detalles del paciente -->
                        <div class="PanelDerecho">
                            <div class="form-group">
                                <label for="nombre">Nombre</label><br>
                                <input type="text" name="nombre" class="form-control" id="nombre"
                                    placeholder="Ingrese el nombre del Paciente" required>
                            </div>
                            <div class="form-group">
                                <label for="apellidopaterno">Apellido Paterno</label><br>
                                <input type="text" name="apellidopaterno" class="form-control"
                                    id="apellidopaterno" placeholder="Ingrese el apellido paterno"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="apellidomaterno">Apellido Materno</label><br>
                                <input type="text" name="apellidomaterno" class="form-control"
                                    id="apellidomaterno" placeholder="Ingrese el apellido materno"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="edad">Edad</label><br>
                                <input type="number" name="edad" class="form-control" id="edad"
                                    placeholder="Ingrese la edad" required>
                            </div>
                            <div class="form-group">
                                <label for="sexo">Sexo</label><br>
                                <select name="sexo" class="form-control" id="sexo" required>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipo_sangre">Tipo de Sangre</label><br>
                                <select name="tipo_sangre" id="tipo_sangre" class="form-control"
                                    required>
                                    <option value="">Seleccione el tipo de sangre</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                                <small id="tipo_sangreHelp" class="form-text text-muted">Seleccione el
                                    tipo de sangre del paciente.</small>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>



<script>
    var menuDatos = document.getElementById('MenuDatos');
      var derecha = document.querySelectorAll('.derecha');
      document.getElementById("menu").style.display = 'block';

      var btntogglerecetas = document.getElementById('toggle-recetas');

      function toggleMenu() {
          const menu = document.querySelector("#menu");
          const aside = document.querySelector("#aside");
          const icon = document.querySelector("#icon");

          const isCollapsed = menu.classList.toggle("collapsed"); // Alterna la clase y almacena el estado colapsado

          // Configuración para el estado colapsado o expandido
          if (isCollapsed) {
              aside.style.width = '7%'; // Ancho del menú colapsado
              menu.querySelectorAll(".text").forEach(item => item.style.display = "none"); // Ocultar el texto
              icon.innerHTML = "➡️"; // Cambiar el icono al estado colapsado
              icon.setAttribute("aria-expanded", "false"); // Accesibilidad
          } else {
              aside.style.width = '16%'; // Ancho del menú expandido
              menu.querySelectorAll(".text").forEach(item => item.style.display = "block"); // Mostrar el texto
              icon.innerHTML = "⬅️"; // Cambiar el icono al estado expandido
              icon.setAttribute("aria-expanded", "true"); // Accesibilidad
          }

          // Transiciones para un efecto suave en el cambio de tamaño
          aside.style.transition = "width 0.3s ease";
      }
</script>
