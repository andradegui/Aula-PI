<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>E-commerce</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    e-Commerce
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarCategoria" role="button" data-bs-toggle="dropdown">Categorias</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarCategoria">
                                @foreach (\App\Models\Category::all() as $category)
                                    <a class="dropdown-item" href="{{ route('serach-category', $category->id) }}">{{ $category->name }}</a>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarTag" role="button" data-bs-toggle="dropdown">Tags</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarTag">
                                @foreach (\App\Models\Tag::all() as $tag)
                                    <a class="dropdown-item" href="{{ route('serach-tag', $tag->id) }}">{{ $tag->name }}</a>
                                @endforeach
                            </ul>
                        </li>
                        @if(Auth()->user() && Auth()->user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product.index') }}">
                                Admin
                            </a>
                        </li>
                        @endif
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarUser" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUser">
                                    <a href="#" class="dropdown-item">Meu Perfil</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="py-4 container">
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session()->get('error') }}</div>
        @endif
        @yield('content')
    </main>
    <footer class="container p-5 bg-primary text-white">
        <div class="row">
            <div class="col-sm-8 mb-5">
                <h2 class="h4">Localização:</h2>
                <address>Rua Lorem, ipsum dolor, 386<br>
                Lorem, ipsum - Lorem, LR<br>
                CEP: 00000-000<br>
                Telefone: (11) 8888-8888
                </address>
            </div>
            <div class="col-sm-4">
                <h2 class="h4">Horario de Funcionamento para loja fisica</h2>
                <ul class="list-unstyled">
                    <li>Segunda - Sexta: 9:00 - 20:00</li>
                    <li>Sábado - 9:00 - 16:00</li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>
