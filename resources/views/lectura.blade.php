<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cartas.css') }}">
    <link rel="stylesheet" href="{{ asset('css/botonflotante.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formarchivo.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Sembrador Escolar - Lecturas</title>
</head>

<body>
    <div class="container">
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
                    <h2>Crear lectura</h2>
                    <x-subirlectura />
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/botonflotante.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>