<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework Tray - Desenvolvedor PHP I</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    {{-- Poderia utilizar o MIX para que o css ficasse no diretório resources e fosse replicado para o public, mas somente para simplificar o projeto, criei diretamente na Public --}}
    {{-- Bootstrap - stylesheet e icones --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">

        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('vendors.index')}}">
                        Home
                    </a>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Vendedores</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Vendas</a>
                          </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        @isset($mensagemSucesso)
            <div class="alert alert-success"> {{ $mensagemSucesso}} </div>
        @endisset

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <main>
            <div class="tittle">
                <h1>{{ $title }}</h1>
            </div>


            {{ $slot }}
        </main>

        <footer>
            <p class="rodape">
                Aplicação desenvolvida para fins de estudo por João Passareli.<br>
                Desenvolvimento de Aplicação de Cadastro de Vendedores e registro de Vendas e Comissões.
            </p>
        </footer>
    </div>

</body>
</html>
