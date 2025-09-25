<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Sistema de Votación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Perfil de {{ $usuario->name ?? 'Usuario' }}</h2>
        <p><strong>Email:</strong> {{ $usuario->email ?? 'email@ejemplo.com' }}</p>

        <a href="/" class="btn btn-secondary">Volver al inicio</a>

        <form action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-danger">Cerrar sesión</button>
        </form>
    </div>
</body>
</html>
