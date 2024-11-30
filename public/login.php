<?php
require '../includes/autoload.php';

use Src\Controllers\UserController;

$controller = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $playerId = $_POST['player_id'];
    $password = $_POST['password'];
    if ($controller->login($playerId, $password)) {
        echo "Login bem-sucedido!";
    } else {
        echo "ID ou senha incorretos.";
    }
}

if ($user) {
  session_start();
  $_SESSION['player_id'] = $playerId; // Define o ID do jogador na sessão
  header("Location: dashboard.php");
  exit;
}

?>
<form method="POST">
    <input type="text" name="player_id" placeholder="ID do Jogador" required>
    <input type="password" name="password" placeholder="Senha" required>
    <button type="submit">Login</button>
</form>
