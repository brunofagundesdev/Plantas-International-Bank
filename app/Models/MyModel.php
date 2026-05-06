<?php

namespace App\Models;

use CodeIgniter\Model;

class MyModel extends Model {
    protected $useAutoIncrement = false;

    protected $beforeInsert = ['setUUID'];

    protected function setUUID(array $data)
    {
        if (empty($data['id'])) {
            $data['id'] = uuid4();
        }

        return $data;
    }
}

?>