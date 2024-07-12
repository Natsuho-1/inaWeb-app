<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Gestión de Asignaturas')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
            height: auto;
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
                    <a href="{{ route('asignaturas.index') }}" class="nav-link"><i class="bi bi-book-half"></i> Asignaturas</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('asignaturas.create') }}" class="nav-link"><i class="bi bi-patch-plus-fill"></i> Agregar Asignatura</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('asignacion_asignaturas.create') }}" class="nav-link"><i class="bi bi-card-list"></i> Asignación de Asignaturas</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('asignacion_asignaturas.index') }}" class="nav-link"><i class="bi bi-list-check"></i> Ver Asignaciones</a>
                </li>
            </ul>
        </div>
        <div class="content-area main-content">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.form-select').select2();
        });
    </script>
</body>

</html>
