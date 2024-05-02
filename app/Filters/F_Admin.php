<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class F_Admin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $user = session('users');
        if ($user['role'] == 'admin') {
            return redirect()->back();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
