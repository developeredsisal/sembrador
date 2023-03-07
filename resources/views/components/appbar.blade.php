<div class="topbar">
    <div class="toggle">
        <ion-icon name="menu-outline"></ion-icon>
    </div>

    <div class="user">
        <span class="role ocultar">{{ auth()->user()->name }}</span>
    </div>
</div>

<script src="{{ asset('js/appbar.js') }}"></script>