<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
</head>
<body>
    <div class="container-header">
        <header>
            <section>
                <h1>PAGINA DE POSTS</h1>
                <nav>
                    <a href="{{ route('posts.create.view') }}">Criar Novo Post</a> |
                    <a href="{{ route('home') }}">Página Inicial</a> |
                    <a href="{{ route('logout') }}">Sair</a>
                </nav>
            </section>
        </header>
    </div>
    <section>
        <h2>Lista de Posts</h2>
        @if($posts->isEmpty())
            <p>Nenhum post disponível.</p>
        @else
            <ul>
                @foreach($posts as $post)
                    <li>
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->content }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </section>
    <footer>
    </footer>
</body>
</html>
