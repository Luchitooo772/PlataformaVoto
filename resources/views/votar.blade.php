<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleta de Votación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .boleta { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 10px; }
        .opcion { border: 2px solid #ccc; border-radius: 8px; text-align: center; padding: 10px; background: #fff; }
        .opcion img { max-width: 100%; border-radius: 5px; }
        .opcion input { margin-top: 10px; }
    </style>
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2 class="mb-4 text-center">Elige tu candidato</h2>

    <form method="POST" action="/votar">
        @csrf
        <div class="boleta">
            @foreach ($candidatos as $c)
                <label class="opcion">
                    @if($c->foto)
                        <img src="{{ asset('storage/'.$c->foto) }}" alt="{{ $c->nombre }}">
                    @endif
                    <p class="fw-bold">{{ $c->partido }}</p>
                    <p>{{ $c->nombre }}</p>
                    <input type="radio" name="candidato" value="{{ $c->id }}">
                </label>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-success btn-lg">Confirmar Voto</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
