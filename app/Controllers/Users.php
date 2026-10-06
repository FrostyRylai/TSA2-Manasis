<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function profile()
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->first();

        return view('profile', $data);
    }
}