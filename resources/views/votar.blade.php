<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleta de Votación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            max-width: 900px;
        }

        h2 {
            color: #4c4cff;
        }

        .boleta {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .opcion {
            border: 2px solid #ddd;
            border-radius: 15px;
            text-align: center;
            padding: 20px;
            background: #fff;
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
        }

        .opcion:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            border-color: #4c4cff;
        }

        .opcion img {
            max-width: 100%;
            border-radius: 10px;
            height: 150px;
            object-fit: cover;
        }

        .opcion p {
            margin: 10px 0 5px;
        }

        .opcion input {
            margin-top: 10px;
        }

        .btn-votar {
            background-color: #4c4cff;
            border: none;
        }

        .btn-votar:hover {
            background-color: #3a3acc;
        }

        .mensaje {
            text-align: center;
            font-weight: bold;
            color: #ff4c4c;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container mt-4">

    <h2 class="text-center">Hola {{ $usuario->nombre }}, elige tu candidato</h2>

    @if($usuario->ha_votado)
        <p class="mensaje">Ya has votado</p>
    @else
        <form method="POST" action="/votar">
            @csrf
            <div class="boleta">
                @foreach ($candidatos as $c)
                    <label class="opcion">
                        @if($c->foto)
                            <img src="{{ asset('storage/'.$c->foto) }}" alt="{{ $c->nombre }}">
                        @else
                            <img src="https://via.placeholder.com/200x150?text=Sin+Foto" alt="{{ $c->nombre }}">
                        @endif
                        <p class="fw-bold">{{ $c->partido }}</p>
                        <p>{{ $c->nombre }}</p>
                        <input type="radio" name="candidato" value="{{ $c->id }}">
                    </label>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-votar btn-lg shadow-sm">Confirmar Voto</button>
            </div>
        </form>
    @endif

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
