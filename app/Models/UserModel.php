<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['firstname', 'lastname', 'email', 'phone', 'password'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getUsers()
    {
        return $this->findAll();
    }

    public function addUser(array $userData): void
    {
        $this->db->transStart();
        $this->save($userData);
        $this->db->transComplete();
    }

    public function updateUser(int $userId, array $userData): void
    {
        $this->db->transStart();
        $this->update($userId, $userData);
        $this->db->transComplete();
    }
}