<?php

namespace App\Services;

use App\Models\UserModel;
use App\Models\AccountModel;

class UserService
{
    protected $userModel;
    protected $accountModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->accountModel = new AccountModel();
    }

    /**
     * Cadastro de usuário + criação automática da conta
     */
    public function register(array $data)
    {
        $db = \Config\Database::connect();
        $db->transStart();

        $userId = service('uuid')->uuid4()->toString();

        // 1. cria usuário
        $this->userModel->insert([
            'id' => $userId,
            'username' => $data['username'],
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' => $data['password'] // hash acontece no model
        ]);

        // 2. cria conta
        $accountId = service('uuid')->uuid4()->toString();

        $this->accountModel->insert([
            'id' => $accountId,
            'user_id' => $userId,
            'balance' => 0
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            throw new \Exception('Erro ao registrar usuário');
        }

        return [
            'user_id' => $userId,
            'account_id' => $accountId
        ];
    }

    public function login(string $username, string $password)
    {
        $user = $this->userModel
            ->where('username', $username)
            ->first();

        if (!$user) {
            throw new \Exception('Usuário não encontrado');
        }

        if (!password_verify($password, $user['password_hash'])) {
            throw new \Exception('Senha inválida');
        }

        // remove senha antes de retornar
        unset($user['password']);

        return $user;
    }
}