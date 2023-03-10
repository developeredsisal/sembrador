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

        <div class="container-fluid">
            <div class="card-header">
                <h2 class="role">Lecturas</h2>
            </div>
        </div>

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
                        <td data-label="Tiempo">{{ $l->tiempo }} min</td>
                        <td data-label="Grado">{{ $l->grado_nombre }}</td>
                        <td data-label="Imagen"><img class="imagen" src="{{ URL::to('/') . '/lecturas/' . $l->id . '/' . $l->imagen }}"></td>
                        <td data-label="Acciones">
                            <div class="btn-group me-2" role="group">
                                <form action="{{ route('editar-lectura', ['id' => $l->id]) }}" method="GET">
                                    @csrf
                                    @method('UPDATE')
                                    <button type="submit" class="btn btn-warning" data-toggle="tooltip" title="Editar">
                                        <i class="material-icons">border_color</i>
                                    </button>
                                </form>
                            </div>
                            <div class="btn-group me-2 my-2" role="group">
                                <form action="{{ route('subir-actividad', ['id' => $l->id]) }}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Agregar actividad">
                                        <i class="material-icons">bookmark_add</i>
                                    </button>
                                </form>
                            </div>
                            <div class="btn-group me-2" role="group">
                                <form action="{{ route('eliminar-lectura', ['id' => $l->id]) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar la lectura?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Eliminar">
                                        <i class="material-icons">delete</i>
                                    </button>
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
        <button id="btn-float" class="btn btn-primary btn-float" data-toggle="tooltip" title="Agregar lectura">
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
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        setTimeout(function() {
            document.querySelector('.alert').classList.add('d-none');
        }, 5000);
    </script>
    <x-foot />
</body>

</html>