<?php
namespace Src\Controllers;

use Src\Models\User;

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register($playerId, $password) {
        return $this->userModel->create($playerId, $password);
    }

    public function login($playerId, $password) {
        return $this->userModel->authenticate($playerId, $password);
    }
}
?>
