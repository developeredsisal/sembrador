<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-head />
    <title>Sembrador Escolar - Actividades</title>
</head>

<body>
    <x-navbar />

    <div class="main">
        <x-appbar />
        <!-- Botón flotante -->
        <button id="btn-float" class="btn-float">
            <span class="icon">
                <i class="material-icons">add</i>
            </span>
        </button>

        <!-- Modal -->
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close">
                    <i class="material-icons">cancel</i>
                </span>
                <h2>Subir actividad</h2>
                <x-subiractividad />
            </div>
        </div>
    </div>

    <script src="{{ asset('js/botonflotante.js') }}"></script>
    <x-foot />
</body>

</html>