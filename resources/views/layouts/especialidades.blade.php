<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Gestión de Especialidades')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            margin: 0;
            background-color: #F0F2F5;
        }

        .container-fluid {
            flex: 1;
            display: flex;
            padding: 0;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            background-color: #343a40 !important;
        }

        .content-area {
            margin-left: 250px;
            padding: 20px;
            flex: 1;
        }

        #sidebarMenu {
            transition: transform 0.3s ease;
            background-color: #ffffff !important;
        }

        #sidebarMenu.hidden {
            transform: translateX(-100%);
            background-color: #ffffff !important;
        }

        .main-content {
            margin-left: 250px;
        }

        .main-content.hidden {
            margin-left: 0;
        }

        .navbar-custom {
            background-color: #9699D6 !important;
        }

        .sidebar .nav-link {
            color: #000000;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link:hover {
            background-color: #9699D6;
        }

        .menu-toggle-custom {
            background-color: #9699D6;
            border: none;
            color: #ffffff;
        }

        .menu-toggle-custom:hover {
            background-color: #ffffff;
            color: #000000;
        }
        .sidebar .bi {
            margin-right: 8px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container-fluid">
            <button class="btn menu-toggle-custom" id="menu-toggle">☰</button>
            <a class="navbar-brand ms-3" href="#">Gestión de Especialidades</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Usuario
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-key-fill"></i>Cambiar Contraseña</a></li>
                            <li><a  class="dropdown-item" href="#"><i class="bi bi-box-arrow-left"></i>Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div id="sidebarMenu" class="col-md-3 col-lg-2 sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('especialidades.index') }}" class="nav-link"><i class="bi bi-book-half"></i>
                        Especialidades</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('especialidades.create') }}" class="nav-link"><i class="bi bi-patch-plus-fill"></i>
                        Agregar Especialidad</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('especialidades.modify') }}" class="nav-link"><i class="bi bi-pencil-square"></i>
                        Modificar Especialidad</a>
                </li>
            </ul>
        </div>
        <div class="content-area main-content">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('sidebarMenu').classList.toggle('hidden');
            document.querySelector('.main-content').classList.toggle('hidden');
        });
    </script>
</body>

</html>
