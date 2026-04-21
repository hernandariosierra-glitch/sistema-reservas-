<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Reservas</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #eef2f7;
            font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            background-color: #0f172a;
            min-height: 100vh;
            padding: 25px 15px;
        }

        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border-radius: 10px;
            margin-bottom: 8px;
        }

        .sidebar a:hover {
            background-color: #1e293b;
            color: white;
        }

        .content {
            flex-grow: 1;
            padding: 30px;
        }

        .card-custom {
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.08);
            border: none;
        }

        .badge-confirmada {
            background-color: #dcfce7;
            color: #15803d;
        }

        .badge-pendiente {
            background-color: #dbeafe;
            color: #1d4ed8;
        }

        .badge-cancelada {
            background-color: #e2e8f0;
            color: #475569;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="sidebar">
        <h5 class="text-white mb-4">
            <i class="bi bi-bus-front"></i> Sistema
        </h5>

        <a href="{{ route('clientes.index') }}">
            <i class="bi bi-people"></i> Clientes
        </a>

        <a href="{{ route('vehiculos.index') }}">
            <i class="bi bi-car-front"></i> Vehículos
        </a>

        <a href="{{ route('choferes.index') }}">
            <i class="bi bi-person-badge"></i> Choferes
        </a>

        <a href="{{ route('reservas.index') }}">
            <i class="bi bi-calendar-check"></i> Reservas
        </a>
    </div>

    <div class="content">
        @if(session('success'))
            <div class="alert alert-success rounded-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</div>

</body>
</html>