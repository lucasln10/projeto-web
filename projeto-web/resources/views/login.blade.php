<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
<div class="login-container">
<h1>Login</h1>
<form method="POST" action="{{ route('login.post') }}">
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
    <button type="submit">Entrar</button>
</form>
</div>
<footer>
<div>
<p>Não tem uma conta? <a href="{{ route('register.view') }}">Registre-se aqui</a></p>
</div>
</footer>
</body>
</html>
