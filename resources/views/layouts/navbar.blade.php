<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <div class="container-fluid justify-content-center position-relative">
        <div class="container">
             <a id="Titulo" class="navbar-brand mx-auto" href="#">Instituto Nacional de Apopa</a>
        </div>
        <button class="navbar-toggler position-absolute end-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="{{ route('menus.admin') }}">Menu Principal</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle custom-nav-link" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Usuario
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-key-fill"></i>Cambiar Contraseña</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-left"></i>Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-custom {
        background-color: #9699D6 !important;
    }
    .navbar-brand {
        font-size: 1.5rem;
        color: #000000 !important;
    }
    .custom-nav-link {
        color: #000000 !important;
        font-size: 1rem;
    }
    .custom-nav-link:hover {
        color: #f0f0f0 !important;
    }
    .dropdown-menu .dropdown-item {
        color: #000000 !important;
    }
    .dropdown-menu .dropdown-item:hover {
        background-color: #9699D6 !important;
        color: #ffffff !important;
    }
</style>
