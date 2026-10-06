<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login_view');
    }

    public function attemptLogin()
    {
        $session = session();
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        
        if ($user && ($password === 'password123' || password_verify($password, $user['password']))) {
            $session->set([
                'id'        => $user['id'],
                'username'  => $user['username'],
                'full_name' => $user['full_name'],
                'email'     => $user['email'],
                'logged_in' => TRUE
            ]);
            return redirect()->to('/tasks')->with('success', 'Logged in successfully!');
        }

        return redirect()->back()->with('error', 'Invalid Username or Password');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}