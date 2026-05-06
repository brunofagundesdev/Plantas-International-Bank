<?php

namespace App\Models;
use App\Models\MyModel;

use Override;

class UserModel extends MyModel
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'username',
        'full_name',
        'email',
        'password_hash'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Validation
    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[100]|is_unique[user.username]',
        'email'    => 'required|valid_email|is_unique[user.email]',
        'password' => 'required|min_length[6]',
        'full_name' => 'required|max_length[255]'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashPassword'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['hashPassword'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function hashPassword(array $data)
    {
        if (isset($data['password'])) {
            $data['password_hash'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }
        unset($data['password']);

        return $data;
    }

    public function findSafe(string $id)
    {
        $user = $this->find($id);
        unset($user['password_hash']);

        return $user;
    }

    public function findAllSafe()
    {
        $users = $this->findAll();

        foreach ($users as &$user) {
            unset($user['password']);
        }

        return $users;
    }
}
