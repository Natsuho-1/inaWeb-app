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
            position: relative;
            background-color: #ffffff !important;
        }

        .content-area {
            padding: 20px;
            flex: 1;
        }

        .navbar-custom {
            background-color: #9699D6 !important;
        }

        .sidebar .nav-link {
            color: #000000;
        }

        .sidebar .nav-link:hover {
            background-color: #9699D6;
        }

        .sidebar .bi {
            margin-right: 8px;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')
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
</body>

</html>
