<?php

namespace App\Services;

use App\Models\TransactionModel;
use App\Models\AccountModel;

class TransactionService
{
    protected $transactionModel;
    protected $accountModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->accountModel = new AccountModel();
    }

    public function transfer(string $fromId, string $toId, float $amount, string $description)
    {
        $from = $this->accountModel->find($fromId);

        if ($from['balance'] < $amount) {
            throw new \Exception('Saldo insuficiente');
        }

        $db = \Config\Database::connect();
        $db->transStart();

        $this->accountModel->builder()
            ->where('id', $fromId)
            ->set('balance', "balance - $amount", false)
            ->update();

        $this->accountModel->builder()
            ->where('id', $toId)
            ->set('balance', "balance + $amount", false)
            ->update();

        $this->transactionModel->builder()->insert([
            'account_from' => $fromId,
            'account_to'   => $toId,
            'type'         => 'TRANSFERENCIA',
            'origin_type'  => 'INTERNAL',
            'description'  => $description,
            'amount'       => $amount
        ]);


        $db->transComplete();

        if ($db->transStatus() === false) {
            throw new \Exception('Erro na transação');
        }
    }
}
