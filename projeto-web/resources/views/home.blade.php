<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div>
        <header>
            <h1>PAGINA INICIAL</h1>
        </header>
        <section>
            <p>Bem-vindo à página inicial do nosso site!</p>
            <p><a href="{{ route('posts.all') }}">Ver Posts</a></p>
            <p><a href="{{ route('posts.create.view') }}">Criar Post</a></p>
            <p><a href="{{ route('logout') }}">Sair</a></p>
        </section>
        <footer>
            <p>© 2024 Meu Site. Todos os direitos reservados.</p>
        </footer>
    </div>
</body>
</html>
