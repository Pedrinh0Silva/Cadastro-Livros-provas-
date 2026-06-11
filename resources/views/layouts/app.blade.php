<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Biblioteca')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
            color: #1a202c;
            min-height: 100vh;
        }

        nav {
            background: #1e3a5f;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        nav a.brand {
            color: #fff;
            font-size: 1.25rem;
            font-weight: 700;
            text-decoration: none;
            letter-spacing: 0.5px;
        }

        nav a.nav-link {
            color: #a0c4e8;
            text-decoration: none;
            font-size: 0.9rem;
        }

        nav a.nav-link:hover { color: #fff; }

        .container {
            max-width: 960px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .alert {
            padding: 0.85rem 1.2rem;
            border-radius: 6px;
            margin-bottom: 1.25rem;
            font-size: 0.9rem;
        }

        .alert-success { background: #d1fae5; color: #065f46; border-left: 4px solid #10b981; }
        .alert-error   { background: #fee2e2; color: #991b1b; border-left: 4px solid #ef4444; }
    </style>
</head>
<body>

<nav>
    <a href="{{ route('livros.index') }}" class="brand">📚 Biblioteca</a>
    <a href="{{ route('livros.index') }}" class="nav-link">Todos os livros</a>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <ul style="padding-left:1.2rem">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</div>

</body>
</html>
