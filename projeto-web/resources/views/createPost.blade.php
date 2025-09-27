<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="{{ asset('css/createPosts.css') }}">
</head>
<body>
    <div>
        <header>
            <h1>PAGINA DE CRIAÇA DE POSTS</h1>
        </header>
        <section>
            <nav>
                <a href="{{ route('posts.all') }}">Ver Todos os Posts</a> |
                <a href="{{ route('home') }}">Página Inicial</a> |
                <a href="{{ route('logout') }}">Sair</a>
            </nav>
        </section>
    </div>
    <h2>Esse e seu id: {{ Auth::id() }}</h2>
    <section>
        <h1>Criar Post</h1>
        <form action="{{ route('posts.create') }}" method="POST">
            @csrf
            <div>
                <label for="title">Título:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div>
                <label for="content">Conteúdo:</label>
                <textarea id="content" name="content" required></textarea>
            </div>
            <div>
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            </div>
            <button type="submit">Criar Post</button>
        </form>
    </section>
    <footer>
    </footer>
</body>
</html>
