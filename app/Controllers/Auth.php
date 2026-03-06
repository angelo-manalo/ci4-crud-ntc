<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    private UserModel $users;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->users = new UserModel();
    }

    public function register() { return view('auth/register'); }

    public function attemptRegister()
    {
        if (! $this->users->registerUser($this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $this->users->errors());
        }

        return redirect()->to('/login')->with('success', 'Registration successful. Please log in.');
    }

    public function login() { return view('auth/login'); }

    public function attemptLogin()
    {
        $user = $this->users->authenticate(
            (string) $this->request->getPost('email'),
            (string) $this->request->getPost('password')
        );

        if ($user === null) {
            return redirect()->back()->withInput()->with('error', 'Invalid login credentials.');
        }

        session()->set($this->users->sessionData($user));

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
