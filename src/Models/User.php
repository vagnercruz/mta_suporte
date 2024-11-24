<?php
namespace Src\Models;

use Src\Database\Database;

class User {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function create($playerId, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO users (player_id, password) VALUES (?, ?)");
        return $stmt->execute([$playerId, $hashedPassword]);
    }

    public function authenticate($playerId, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE player_id = ?");
        $stmt->execute([$playerId]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            return true;
        }
        return false;
    }
}
