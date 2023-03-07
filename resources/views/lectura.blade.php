<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-head />
    <title>Sembrador Escolar - Lecturas</title>
</head>

<body>
    <x-navbar />

    <div class="main">
        <x-appbar />
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Tiempo</th>
                        <th scope="col">Grado</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $c = 1; ?>
                    @foreach ($lecturas as $l)
                    <tr>
                        <td>{{ $c++ }}</td>
                        <td data-label="Nombre">{{ $l->nombre }}</td>
                        <td data-label="Tiempo">{{ $l->tiempo }}</td>
                        <td data-label="Grado">{{ $l->grado }}</td>
                        <td data-label="Imagen"><img class="imagen" src="{{ URL::to('/') . '/lecturas/' . $l->id . '/' . $l->imagen }}"></td>
                        <td data-label="Acciones">
                            <div>
                                <form action="{{ route('editar-lectura', ['id' => $l->id]) }}" method="GET">
                                    @csrf
                                    @method('UPDATE')
                                    <button type="submit" class="btn-editar">Editar</button>
                                </form>
                                <form action="{{ route('eliminar-lectura', ['id' => $l->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-eliminar">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if (session('success'))
        <div id="ocultar2" class="notificacion">
            <div class="alert alert-success alert-dismissible fade show alert-custom" role="alert">
                {{ session('success') }}
            </div>
        </div>
        @endif

        @if (session('error'))
        <div id="ocultar2" class="notificacion">
            <div class="alert alert-danger alert-dismissible fade show alert-custom" role="alert">
                {{ session('error') }}
            </div>
        </div>
        @endif

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
                <h4 class="card-title">Crear lectura</h4>
                <x-subirlectura />
            </div>
        </div>
    </div>

    <script src="{{ asset('js/botonflotante.js') }}"></script>
    <script>
        setTimeout(function() {
            document.querySelector('.alert').classList.add('d-none');
        }, 5000);
    </script>
    <x-foot />
</body>

</html>