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
                <h2 class="role">Actividades de la lectura: "{{ $lectura->nombre }}"</h2>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $c = 1; ?>
                    @foreach ($actividades as $actividad)
                        <tr>
                            <td>{{ $c++ }}</td>
                            <td data-label="Nombre">{{ $actividad->nombre }}</td>
                            <td data-label="Imagen"><img class="imagen" src="{{ URL::to('/') . '/actividades/' . $actividad->id . '/' . $actividad->imagen }}"></td>
                            <td data-label="Acciones">
                                <div class="btn-group me-2" role="group">
                                    <form action="" method="GET">
                                        <!-- @csrf
                                    @method('UPDATE') -->
                                        <button type="submit" class="btn btn-warning" data-toggle="tooltip"
                                            title="Editar">
                                            <i class="material-icons">border_color</i>
                                        </button>
                                    </form>
                                </div>
                                <div class="btn-group me-2" role="group">
                                    <form action="{{ route('eliminar-actividad', ['id' => $actividad->id]) }}" method="POST"
                                        onsubmit="return confirm('¿Está seguro de que desea eliminar la actividad?')">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger" data-toggle="tooltip"
                                            title="Eliminar">
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
        <button id="btn-float" class="btn btn-primary btn-float" data-toggle="tooltip" title="Subir actividad">
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
                <h4 class="card-title">Subir actividad</h4>
                <form method="POST" action="/lectura/{{ $lectura->id }}/actividad/registrar" class="form"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="lectura_id" value="{{ $lectura->id }}">
                    <input type="text" name="nombre" class="form-control" id="file-name-input"
                        placeholder="Nombre de la actividad" required>
                    <label for="image-upload-input" class="file-upload">
                        <p>Arrastra y suelta tu imagen</p>
                        <span class="image-upload-name"></span>
                    </label>
                    <input type="file" name="imagen" accept=".jpg, .jpeg, .png, .svg" id="image-upload-input"
                        class="file-upload-input" required>
                    <label for="file-upload-input" class="file-upload">
                        <p>Arrastra y suelta tu archivo</p>
                        <span class="file-upload-name"></span>
                    </label>
                    <input type="file" name="archivo" accept=".zip" id="file-upload-input" class="file-upload-input"
                        required>
                    <div class="btn-upload">
                        <button class="boton btn btn-primary" type="submit">Subir actividad</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/botonflotante.js') }}"></script>
    <script src="{{ asset('js/subiractividad.js') }}"></script>
    <x-foot />
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        setTimeout(function() {
            document.querySelector('.alert').classList.add('d-none');
        }, 4000);
    </script>
</body>

</html>
