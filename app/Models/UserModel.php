<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users2';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'full_name', 'email', 'created_at'];
}