<?php
require '../includes/autoload.php';

use Src\Controllers\UserController;

$controller = new UserController();
$message = "";

// Verifica se o formulário de login ou registro foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'login') {
        // Login
        $playerId = $_POST['player_id'];
        $password = $_POST['password'];
        $user = $controller->login($playerId, $password);
        if ($user) {
            // Redireciona para o dashboard
            header("Location: dashboard.php");
            exit;
        } else {
            $message = "ID ou senha incorretos.";
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'register') {
        // Registro
        $playerId = $_POST['player_id'];
        $password = $_POST['password'];
        if ($controller->register($playerId, $password)) {
            $message = "Usuário registrado com sucesso!";
        } else {
            $message = "Erro ao registrar usuário.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MTA Suporte - Login/Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #3498db, #8e44ad);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }
        .form-container {
            background: white;
            color: black;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }
        .form-container h1 {
            text-align: center;
        }
        .btn-primary {
            background-color: #3498db;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
        .btn-secondary {
            background-color: #8e44ad;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #71368a;
        }
    </style>
</head>
<body>
    <div class="container form-container">
        <h1>Login / Registro</h1>
        <p class="text-center text-danger"><?= $message ?></p>
        <form method="POST">
            <div class="mb-3">
                <label for="player_id" class="form-label">ID do Jogador</label>
                <input type="text" name="player_id" id="player_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" name="action" value="login" class="btn btn-primary w-100 mb-2">Login</button>
            <button type="submit" name="action" value="register" class="btn btn-secondary w-100">Registrar</button>
        </form>
    </div>
</body>
</html>
