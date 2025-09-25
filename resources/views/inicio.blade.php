<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inicio - Sistema de Votación</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* Estilos generales */
    body { 
        background-color: #f0f2f5; 
        font-family: Arial, sans-serif; 
    }

    /* Header */
    .header { 
        background-color: #4c4cff; 
        color: white; 
        border-radius: 0 0 20px 20px; 
        padding: 20px; 
    }

    /* Botón de usuario */
    #user-btn {
        background-color: white;
        border: 1px solid #ccc;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    /* Menú flotante del usuario */
    #user-menu a:hover, #user-menu button:hover {
        background-color: #f0f0f0;
        border-radius: 5px;
    }

    /* Cards de información */
    .info-card {
        background-color: white;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        margin-bottom: 20px;
        transition: transform 0.2s;
    }
    .info-card:hover { transform: translateY(-5px); }
    .info-card h5 { color: #4c4cff; }
    .info-card p { color: #555; }

    /* Botón flotante ChatBot */
    #chatbot-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #4c4cff;
        color: white;
        border: none;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        cursor: pointer;
        z-index: 1000;
    }

    /* Card flotante ChatBot */
    #chatbot-card {
        position: fixed;
        bottom: 90px;
        right: 20px;
        width: 300px;
        max-height: 400px;
        display: none;
        z-index: 1000;
    }

    /* Footer */
    footer {
        margin-top: 40px;
        text-align: center;
        color: #555;
        padding: 20px;
    }

    /* Botón principal */
    .btn-votar {
        background-color: #28a745;
        color: white;
        font-weight: bold;
        padding: 15px;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: transform 0.2s;
    }
    .btn-votar:hover { transform: translateY(-3px); }
</style>
</head>
<body>

<!-- Header -->
<div class="header text-center">
    <div class="d-flex justify-content-between align-items-center">
        <span class="fs-3">☰</span>

        <!-- Botón de usuario -->
        <div class="position-relative">
            <button id="user-btn"><span class="fs-5">👤</span></button>
            <div id="user-menu" class="card shadow-sm p-2" style="position:absolute; top:50px; right:0; display:none; min-width:150px;">
                <a href="{{ route('perfil') }}" class="d-block p-2 text-decoration-none text-dark">Ir a tu perfil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="d-block p-2 text-dark btn btn-link w-100 text-start">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </div>

    <h4 class="mt-3">¡Hola, {{ $usuario->nombre }}!</h4>
    <p>Bienvenido al sistema de votación digital seguro y rápido.</p>
</div>

<div class="container mt-4">
    <!-- Estado del usuario -->
    <div class="card shadow-sm p-3 mb-3">
        <h5 class="mb-0">Tus datos</h5>
        <small>Email: {{ $usuario->email }}</small>
    </div>

    <!-- Cards de guía y beneficios -->
    <div class="info-card">
        <h5>🗳 Cómo votar</h5>
        <p>Selecciona tu candidato o propuesta, confirma tu voto y recibe un comprobante digital. Fácil y rápido.</p>
    </div>

    <div class="info-card">
        <h5>✅ Beneficios de usar la app</h5>
        <p>Vota desde tu dispositivo sin filas, tu voto es seguro y privado, y la app es intuitiva y confiable.</p>
    </div>

    <div class="info-card">
        <h5>🔒 Seguridad</h5>
        <p>Todos tus datos están protegidos con cifrado y medidas de seguridad avanzadas. Tu voto no puede ser alterado.</p>
    </div>

    <div class="info-card">
        <h5>💬 Soporte y ayuda</h5>
        <p>Si tienes dudas, nuestro ChatBot está disponible para guiarte en todo momento. También puedes consultar las preguntas frecuentes.</p>
    </div>

    <!-- Botón principal para votar -->
    <div class="d-grid gap-2 mt-3">
        <a href="/votar" class="btn btn-votar w-100">Empezar a Votar</a>
    </div>

    <!-- Botón para mostrar la gráfica -->
    <div class="d-grid gap-2 mt-3">
        <button id="mostrar-grafica" class="btn btn-info w-100" disabled>Ver resultados (disponible después de la votación)</button>
    </div>

    <!-- Card con la gráfica -->
    <div id="grafica-votos-card" class="card shadow-sm p-3 mt-3" style="display:none;">
        <h5>Resultados de votación</h5>
        <canvas id="graficaVotos" width="400" height="200"></canvas>
    </div>
</div>

<!-- Botón flotante de ChatBot -->
<button id="chatbot-btn">💬</button>

<!-- Card flotante de ChatBot -->
<div id="chatbot-card" class="card shadow-sm p-3">
    <h5>ChatBot</h5>
    <div class="border rounded p-3 mb-3" style="height: 180px; overflow-y: auto;">
        <p><strong>Bot:</strong> Hola {{ $usuario->nombre }}, ¿en qué puedo ayudarte?</p>
    </div>
    <form class="d-flex">
        <input type="text" class="form-control me-2" placeholder="Escribe tu mensaje...">
        <button class="btn btn-primary" type="button">Enviar</button>
    </form>
</div>

<!-- Footer -->
<footer>
    <p>Soporte: soporte@votacionapp.com | Tel: 0800-123-4567</p>
    <p>© 2025 Sistema de Votación Digital. Todos los derechos reservados.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<script>
    // Toggle menú usuario
    const userBtn = document.getElementById('user-btn');
    const userMenu = document.getElementById('user-menu');
    userBtn.addEventListener('click', () => {
        userMenu.style.display = userMenu.style.display === 'none' ? 'block' : 'none';
    });

    // Toggle ChatBot
    const chatbotBtn = document.getElementById('chatbot-btn');
    const chatbotCard = document.getElementById('chatbot-card');
    chatbotBtn.addEventListener('click', () => {
        chatbotCard.style.display = chatbotCard.style.display === 'none' ? 'block' : 'none';
    });

    // Registrar plugin de Chart.js
    Chart.register(ChartDataLabels);

    // Datos de ejemplo para la gráfica
    const datosVotos = {
        labels: ['Candidato A', 'Candidato B', 'Candidato C'],
        datasets: [{
            label: 'Cantidad de votos',
            data: [12, 19, 7],
            backgroundColor: [
                'rgba(76, 76, 255, 0.8)',
                'rgba(40, 167, 69, 0.8)',
                'rgba(255, 193, 7, 0.8)'
            ],
            borderColor: [
                'rgba(76, 76, 255, 1)',
                'rgba(40, 167, 69, 1)',
                'rgba(255, 193, 7, 1)'
            ],
            borderWidth: 2,
            borderRadius: 6
        }]
    };

    const config = {
        type: 'bar',
        data: datosVotos,
        options: {
            responsive: true,
            animation: { duration: 1500, easing: 'easeOutBounce' },
            plugins: {
                legend: { display: false },
                title: { display: true, text: 'Resultados de votación', font: { size: 18 } },
                tooltip: { enabled: true },
                datalabels: { anchor: 'end', align: 'top', color: '#000', font: { weight: 'bold' }, formatter: v => v }
            },
            scales: { y: { beginAtZero: true, ticks: { stepSize: 5 }, grid: { color: '#ddd' } }, x: { grid: { display: false } } }
        },
        plugins: [ChartDataLabels]
    };

    // Crear gráfica
    const graficaVotos = new Chart(document.getElementById('graficaVotos'), config);

    // Mostrar botón de resultados
    const votacionFinalizada = true; // cambiar en producción
    const botonGrafica = document.getElementById('mostrar-grafica');
    if (votacionFinalizada) botonGrafica.disabled = false;

    botonGrafica.addEventListener('click', () => {
        const card = document.getElementById('grafica-votos-card');
        card.style.display = card.style.display === 'none' ? 'block' : 'none';
    });
</script>
</body>
</html>
