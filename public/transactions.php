<?php
require '../includes/autoload.php';

use Src\Controllers\TransactionController;

$controller = new TransactionController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $playerId = $_POST['player_id'];
    $amount = $_POST['amount'];
    if ($controller->createTransaction($playerId, $amount)) {
        echo "Transação registrada com sucesso!";
    } else {
        echo "Erro ao registrar transação.";
    }
}
?>
<form method="POST">
    <input type="text" name="player_id" placeholder="ID do Jogador" required>
    <input type="number" name="amount" placeholder="Valor" required>
    <button type="submit">Registrar Transação</button>
</form>
