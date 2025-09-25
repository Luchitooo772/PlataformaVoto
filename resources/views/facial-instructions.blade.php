<!-- resources/views/facial-instructions.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso con Reconocimiento Facial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
        }
        .instructions-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding: 2rem;
            max-width: 500px;
            margin: auto;
        }
        .instruction-step {
            display: none;
        }
        .instruction-step.active {
            display: block;
        }
        img.example {
            max-width: 200px;
            margin: 1rem auto;
            display: block;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <div class="container d-flex justify-content-center align-items-center flex-grow-1">
        <div class="instructions-card text-center">
            <h4 class="fw-bold mb-3">Preparación para el Escaneo</h4>

            <!-- Paso 1 -->
            <div class="instruction-step active" id="step-1">
                <p><i class="bi bi-brightness-high text-warning"></i> Asegúrese de estar en un lugar bien iluminado.</p>
                <img src="/images/ejemplo-luz.jpg" alt="Ejemplo buena iluminación" class="example">
                <button class="btn btn-primary mt-3" onclick="nextStep(2)">Siguiente</button>
            </div>

            <!-- Paso 2 -->
            <div class="instruction-step" id="step-2">
                <p><i class="bi bi-scissors text-danger"></i> Retire cabello o accesorios que tapen la cara.</p>
                <img src="/images/ejemplo-cara-libre.jpg" alt="Ejemplo cara despejada" class="example">
                <button class="btn btn-primary mt-3" onclick="nextStep(3)">Siguiente</button>
            </div>

            <!-- Paso 3 -->
            <div class="instruction-step" id="step-3">
                <p><i class="bi bi-eye text-success"></i> Mire directo a la cámara y mantenga el rostro inmóvil.</p>
                <img src="/images/ejemplo-camara.jpg" alt="Ejemplo mirando cámara" class="example">
                <button class="btn btn-success mt-3" onclick="goToScanner()">Listo, comenzar escaneo</button>
            </div>
        </div>
    </div>

    <footer class="text-center mt-4">
        <p>&copy; 2025 Sistema de Votación</p>
    </footer>

    <script>
        function nextStep(stepNumber) {
            document.querySelectorAll('.instruction-step').forEach(step => step.classList.remove('active'));
            document.getElementById('step-' + stepNumber).classList.add('active');
        }

        function goToScanner() {
            window.location.href = "/escanear"; // Aquí mandas a la vista con la cámara
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

