<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $user = session()->get('user');

        // 🔹 Logged-in user required
        if (isset($arguments[0]) && $arguments[0] === 'auth') {
            if (! $user) {
                return redirect()->to('/')->with('error', 'Please log in first.');
            }
            if ($user['role'] !== 'user' && $user['role'] === 'admin') {
                return redirect()->to('/admin/dashboard')->with('error', 'Unauthorized access.');
            }
        }

        // 🔹 Admin-only routes
        if (isset($arguments[0]) && $arguments[0] === 'admin') {
            if (! $user) {
                return redirect()->to('/')->with('error', 'Please log in first.');
            }
            if ($user['role'] !== 'admin') {
                return redirect()->to('/home')->with('error', 'Unauthorized access.');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // nothing for now
    }
}
