// Obtener el botón flotante y el modal
const btnFloat = document.getElementById("btn-float");
const modal = document.getElementById("modal");

// Obtener el botón de cerrar del modal
const closeBtn = modal.querySelector(".close");

// Agregar un evento de clic al botón flotante
btnFloat.addEventListener("click", function (event) {
    // Evitar que el evento se propague al resto del documento
    event.stopPropagation();

    // Mostrar el modal
    modal.style.display = "block";
});

// Agregar un evento de clic al botón de cerrar del modal
closeBtn.addEventListener("click", function () {
    // Cerrar el modal
    modal.style.display = "none";
});