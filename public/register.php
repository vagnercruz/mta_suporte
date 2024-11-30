<?php
require '../includes/autoload.php'; // Inclui o autoload corretamente

use Src\Controllers\UserController; // Importa o namespace da classe UserController

$controller = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $playerId = $_POST['player_id'];
    $password = $_POST['password'];
    if ($controller->register($playerId, $password)) {
        echo "Usuário registrado com sucesso!";
    } else {
        echo "Erro ao registrar usuário.";
    }
}
?>
