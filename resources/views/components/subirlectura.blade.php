<form method="POST" action="" class="form" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nombre" class="form-control" id="file-name-input" placeholder="Nombre de la lectura" required>
    <input type="text" name="nombre" class="form-control" id="file-name-input" placeholder="Tiempo: 15" required>
    <label for="image-upload-input" class="file-upload">
        <p>Arrastra y suelta tu imagen</p>
        <span class="image-upload-name"></span>
    </label>
    <input type="file" name="imagen" accept=".jpg, .jpeg, .png, .svg" id="image-upload-input" class="file-upload-input" required>

    <select id="category-select" name="category" class="form-select" required>
        <option value="">Selecciona el grado</option>
        <option value="1">Primero</option>
        <option value="2">Segundo</option>
        <option value="3">Tercero</option>
        <option value="4">Cuarto</option>
        <option value="5">Quinto</option>
        <option value="6">Sexto</option>
    </select>

    <div class="btn-upload">
        <button class="boton" type="submit">Crear lectura</button>
    </div>
</form>

<script>
    const imageUploadInput = document.getElementById('image-upload-input');
    imageUploadInput.addEventListener('change', function() {
        const fileName = this.value.split("\\").pop();
        this.parentNode.querySelector(".image-upload-name").innerHTML = fileName;
    });
    const fileUploadInput = document.getElementById('file-upload-input');
    fileUploadInput.addEventListener('change', function() {
        const fileName = this.value.split("\\").pop();
        this.parentNode.querySelector(".file-upload-name").innerHTML = fileName;
    });
</script>