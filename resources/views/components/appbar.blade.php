<div class="topbar">
    <div class="toggle">
        <ion-icon name="menu-outline"></ion-icon>
    </div>

    <div class="user">
        <span class="role ocultar">{{ auth()->user()->name }}</span>
    </div>
</div>

<script>
    // Selecciona el botón .toggle del menú de navegación y el elemento principal .main
    let toggle = document.querySelector(".toggle");
    let navigation = document.querySelector(".navigation");
    let main = document.querySelector(".main");

    // Agrega un manejador de eventos click al botón .toggle
    toggle.onclick = function() {
        // Alterna la clase "active" en el menú de navegación y en el elemento principal
        navigation.classList.toggle("active");
        main.classList.toggle("active");

        // Guarda el estado actual del menú en el almacenamiento local
        localStorage.setItem("menuState", navigation.classList.contains("active"));
    };

    // Recupera el valor del estado del menú del almacenamiento local
    const menuState = localStorage.getItem("menuState");

    // Si el valor es "true", agrega la clase "active" al menú de navegación y al elemento principal
    if (menuState === "true") {
        navigation.classList.add("active");
        main.classList.add("active");
    } else {
        // De lo contrario, elimina la clase "active" del menú de navegación y del elemento principal
        navigation.classList.remove("active");
        main.classList.remove("active");
    }
</script>
