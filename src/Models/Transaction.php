<?php
namespace Src\Models;

use Src\Database\Database;

class Transaction {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function create($playerId, $amount) {
        $stmt = $this->pdo->prepare("INSERT INTO transactions (player_id, amount) VALUES (?, ?)");
        return $stmt->execute([$playerId, $amount]);
    }

    public function getAllByPlayer($playerId) {
        $stmt = $this->pdo->prepare("SELECT * FROM transactions WHERE player_id = ?");
        $stmt->execute([$playerId]);
        return $stmt->fetchAll();
    }
}
