<?php
require '../includes/autoload.php';

use Src\Models\User;

// Simulação de autenticação (substitua com sistema real)
session_start();
if (!isset($_SESSION['player_id'])) {
    header('Location: index.php');
    exit;
}

// Informações do usuário
$playerId = $_SESSION['player_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f4f9;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .dashboard-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        .logout-btn {
            background-color: #e74c3c;
            border: none;
        }
        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="dashboard-container text-center">
        <h2>Bem-vindo ao Painel!</h2>
        <p>Olá, <strong><?= htmlspecialchars($playerId) ?></strong></p>
        
        <div class="mt-3">
            <a href="logout.php" class="btn btn-danger logout-btn">Sair</a>
        </div>
    </div>
</body>
</html>
