<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-head />
    <title>Sembrador Escolar - Editar Lectura</title>
</head>

<body>
    <x-navbar />

    <div class="main">
        <x-appbar />
        <div class="container-fluid">
            <div class="card-header">
                <h2 class="role">Editar lectura</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('actualizar-lectura', ['id' => $lectura->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4 col-12 py-2">
                            <img src="{{ URL::to('/') . '/lecturas/' . $lectura->id . '/' . $lectura->imagen }}" class="img-thumbnail" alt="Imagen actual">
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $lectura->nombre }}" required>
                            </div>
                            <div class="form-group">
                                <label for="tiempo">Tiempo:</label>
                                <input type="number" name="tiempo" id="tiempo" class="form-control" value="{{ $lectura->tiempo }}" required>
                            </div>
                            <div class="form-group py-3">
                                <label for="imagen">Imagen:</label>
                                <input type="file" name="imagen" id="imagen" class="form-control">
                            </div>
                            <div class="py-2">
                                <a class="a" href="{{ route('lectura') }}">
                                    <button type="button" class="btn btn-secondary btn-md">Cancelar</button>
                                </a>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-foot />
</body>

</html>