<div class="navigation">
    <ul>
        <li>
            <a href="{{ route('inicio') }}">
                <span class="icon">
                    <ion-icon name="logo-github"></ion-icon>
                </span>
                <span id="ocultar" class="title">Sembrador Escolar</span>
            </a>
        </li>

        <li class="{{ Request::is('inicio') ? 'active' : '' }}">
            <a href="{{ route('inicio') }}">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span id="ocultar" class="title">Inicio</span>
            </a>
        </li>

        <li class="{{ Request::is('lectura') ? 'active' : '' }}">
            <a href="{{ route('lectura') }}">
                <span class="icon">
                    <ion-icon name="cloud-upload-outline"></ion-icon>
                </span>
                <span id="ocultar" class="title">Lecturas</span>
            </a>
        </li>

        <li class="{{ Request::is('actividad') ? 'active' : '' }}">
            <a href="{{ route('actividad') }}">
                <span class="icon">
                    <ion-icon name="book-outline"></ion-icon>
                </span>
                <span id="ocultar" class="title">Actividades</span>
            </a>
        </li>

        <li>
            <a href="{{ route('cerrar-sesion') }}">
                <span class="icon">
                    <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span id="ocultar" class="title">Cerrar sesión</span>
            </a>
        </li>
    </ul>
</div>