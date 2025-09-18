<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Sistema de Votación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .header { background-color: #4c4cff; color: white; border-radius: 0 0 20px 20px; padding: 20px; }
        .user-img { width: 40px; height: 40px; border-radius: 50%; object-fit: cover; }
        .card-icon { font-size: 1.8rem; color: #4c4cff; }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header text-center">
        <div class="d-flex justify-content-between align-items-center">
            <span class="fs-3">☰</span>
            <img src="https://via.placeholder.com/40" class="user-img" alt="Usuario">
        </div>
        <h4 class="mt-3">¡Hola, {{ $usuario['nombre'] }}!</h4>
    </div>

    <div class="container mt-4">
        <!-- Beneficio -->
        <div class="alert alert-info">
            <strong>Beneficio:</strong> Votar con nuestra app es seguro y rápido. Tus datos están protegidos.
        </div>

        <!-- Estado -->
        <div class="card shadow-sm p-3 mb-3">
            <h5 class="mb-0">Tus datos</h5>
            <small>Email: {{ $usuario['email'] }}</small>
        </div>

        <!-- Opciones -->
        <div class="row g-3">
            <div class="col-6">
                <a href="/votar" class="btn btn-success w-100 p-3 shadow-sm">Empezar a Votar</a>
            </div>
            <div class="col-6">
                <a href="#chatbot" class="btn btn-primary w-100 p-3 shadow-sm">ChatBot</a>
            </div>
        </div>

        <!-- ChatBot simulación -->
        <div id="chatbot" class="card shadow-sm p-3 mt-4">
            <h5>ChatBot</h5>
            <div class="border rounded p-3 mb-3" style="height: 180px; overflow-y: auto;">
                <p><strong>Bot:</strong> Hola {{ $usuario['nombre'] }}, ¿en qué puedo ayudarte?</p>
            </div>
            <form class="d-flex">
                <input type="text" class="form-control me-2" placeholder="Escribe tu mensaje...">
                <button class="btn btn-primary" type="button">Enviar</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

