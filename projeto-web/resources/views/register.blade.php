<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div>
        <section>
            <h1>PAGINA DE REGISTRO</h1>
            <form method="POST" action="{{ route('register.post') }}">
                @csrf
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" required>
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
                <br>
                <button type="submit">Registrar</button>
            </form>
        </section>
        <footer>
            <p>Já tem uma conta? <a href="{{ route('login.view') }}">Faça login aqui</a></p>
        </footer>
    </div>
</body>
</html>
