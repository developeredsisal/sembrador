<form method="POST" action="" class="form" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nombre" class="form-control" id="file-name-input" placeholder="Nombre de la actividad" required>
    <label for="image-upload-input" class="file-upload">
        <p>Arrastra y suelta tu imagen</p>
        <span class="image-upload-name"></span>
    </label>
    <input type="file" name="imagen" accept=".jpg, .jpeg, .png, .svg" id="image-upload-input" class="file-upload-input" required>
    <label for="file-upload-input" class="file-upload">
        <p>Arrastra y suelta tu archivo</p>
        <span class="file-upload-name"></span>
    </label>
    <input type="file" name="archivo" accept=".zip" id="file-upload-input" class="file-upload-input" required>

    <select id="category-select" name="category" class="form-select" required>
        <option value="">Seleccionar lectura</option>
        <option value="1">Primero</option>
        <option value="2">Segundo</option>
        <option value="3">Tercero</option>
        <option value="4">Cuarto</option>
        <option value="4">Quinto</option>
        <option value="4">Sexto</option>
    </select>

    <div class="btn-upload">
        <button class="boton" type="submit">Subir actividad</button>
    </div>
</form>

<script src="{{ asset('js/subiractividad.js') }}"></script>