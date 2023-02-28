<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Bovinos</title>
    <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<!-- bg-body-tertiary -->
<body>
    <h1 class="text-center mt-4 mb-4 text-light fw-bold">Sistema de gerenciamento de bovinos</h1>
    <nav class="navbar navbar-expand-lg" style="background-color: #13795B;">
        <div class="container-fluid container justify-content-center">
            <a class="navbar-brand text-light" href="/gerenciando_bovinos">Relatório semanal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-0" id="navbarNavAltMarkup">
                <div class="navbar-nav text-center">
                    <a class="nav-link active text-light" aria-current="page" href="{{url("gerenciando_bovinos/bovinos")}}">Lista de todos os bovinos</a>
                    <a class="nav-link text-light" href="{{url("gerenciando_bovinos/cadastrar_bovino")}}">Cadastrar bovino</a>
                    <a class="nav-link text-light" href="{{url("gerenciando_bovinos/abater_bovino")}}">Abater Bovino</a>
                </div>
            </div>
        </div>
    </nav>
    @yield("content")

    <script src="{{url('assets/js/js.js')}}"></script>
</body>
<style>body {
    background: #2B3035;
}</style>
</html>