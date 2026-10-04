<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'username',
        'full_name',
        'email',
        'password',
        'created_at'
    ];

    public function getUser()
    {
        return $this->first();
    }

    public function findByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}