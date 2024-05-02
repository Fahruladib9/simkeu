<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Users;

class Auth extends BaseController
{

    public function index()
    {
        return view('login');
    }

    public function proses()
    {
        $this->users = new M_Users();
        $data = $this->request->getPost();
        $user = $this->users->where('username', $data['username'])->first();
        if ($user && $user->password == $data['password']) {
            $data = [
                'username' => $user->username,
                'nama' => $user->nama,
                'password' => $user->password,
                'role' => $user->role,
            ];

            session()->set('users', $data);

            if ($user->role == 'super admin') {
                return redirect()->to('/');
            }
            if ($user->role == 'admin') {
                return redirect()->to('/admin');
            }
            if ($user->role == 'pimpinan') {
                return redirect()->to('/kepala');
            }
        } else {
            session()->setFlashdata('error', 'Username atau password tidak tersedia');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
