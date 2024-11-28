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
</style>


<aside id="aside">
    <div class="toggle" onclick="toggleMenu()">
        <span class="icon" id="icon">⬅️</span>
    </div>
    <ul id="menu" class="collapsed">
        <li>
            <a class="btn"  href=" {{ route('admin.index') }}">
                <span class="icon">🏡</span>
                <span class="text" style="font-weight: bold;">Inicio</span>
            </a>
        </li>
        <li>
            <a class="btn" href=" {{ route('admin.farmacia.index') }}">
                <span class="icon">💊</span>
                <span class="text" style="font-weight: bold;">Farmacia</span>
            </a>
        </li>
        <li>
            <a class="btn" href="{{ route('admin.consultorio.index') }}">
                <span class="icon">🩺</span>
                <span class="text" style="font-weight: bold;">Consultorios</span>
            </a>
        </li>
        <li>
            <a class="btn" href="#" onclick="showSection(event, 'PanelServicios')">
                <span class="icon">📋</span>
                <span class="text" style="font-weight: bold;">Servicios</span>
            </a>
        </li>

        <li>
            <a class="btn" id="btnreportes" onclick="showSection(event, 'reportes')">
                <span class="icon">💵</span>
                <span class="text" style="font-weight: bold;">Reportes</span>
            </a>
        </li>
    </ul>
</aside>


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
                icon.innerHTML = "→"; // Cambiar el icono al estado colapsado
                icon.setAttribute("aria-expanded", "false"); // Accesibilidad
            } else {
                aside.style.width = '16%'; // Ancho del menú expandido
                menu.querySelectorAll(".text").forEach(item => item.style.display = "block"); // Mostrar el texto
                icon.innerHTML = "←"; // Cambiar el icono al estado expandido
                icon.setAttribute("aria-expanded", "true"); // Accesibilidad
            }

            // Transiciones para un efecto suave en el cambio de tamaño
            aside.style.transition = "width 0.3s ease";
        }
</script>
