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

        // Verificar se o banco já tem superadmin
        $isSuperadmin = $this->isSuperadminCreated() ? 0 : 1;

        $stmt = $this->pdo->prepare("INSERT INTO users (player_id, password, is_superadmin) VALUES (?, ?, ?)");
        return $stmt->execute([$playerId, $hashedPassword, $isSuperadmin]);
    }

    public function isSuperadminCreated() {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM users WHERE is_superadmin = 1");
        return $stmt->fetchColumn() > 0;
    }

    public function authenticate($playerId, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE player_id = ?");
        $stmt->execute([$playerId]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
?>
