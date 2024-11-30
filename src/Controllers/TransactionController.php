<?php
namespace Src\Controllers;

use Src\Models\Transaction;

class TransactionController {
    private $transactionModel;

    public function __construct() {
        $this->transactionModel = new Transaction();
    }

    public function createTransaction($playerId, $amount) {
        return $this->transactionModel->create($playerId, $amount);
    }

    public function listTransactions($playerId) {
        return $this->transactionModel->getAllByPlayer($playerId);
    }
}
