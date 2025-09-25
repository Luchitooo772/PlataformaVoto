<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Votación</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Íconos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
        }
        header {
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 1rem 0;
            margin-bottom: 2rem;
        }
        .welcome-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding: 3rem;
            max-width: 600px;
            margin: auto;
        }
        footer {
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: 3rem;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Header -->
    <header class="text-center">
        <h2 class="fw-bold m-0"><i class="bi bi-check2-square text-primary"></i> Sistema de Votación</h2>
    </header>

    <!-- Contenido principal -->
    <div class="container d-flex justify-content-center align-items-center flex-grow-1">
        <div class="welcome-card text-center">
            <h3 class="fw-bold mb-3">Bienvenido</h3>
            <p class="lead mb-4">Elija un método de acceso para comenzar a votar.</p>
            <div class="d-grid gap-3">
                <a href="/login-facial" class="btn btn-primary btn-lg">
                    <i class="bi bi-camera"></i> Ingresar con Reconocimiento Facial
                </a>
                <a href="/login-manual" class="btn btn-secondary btn-lg">
                    <i class="bi bi-key"></i> Ingresar con Otro Método
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <p>&copy; 2025 Sistema de Votación | Desarrollado por tu equipo</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
