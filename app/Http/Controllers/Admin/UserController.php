<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            ['id' => 1, 'name' => 'Jane Doe', 'email' => 'jane@example.com', 'role' => 'customer'],
            ['id' => 2, 'name' => 'John Admin', 'email' => 'admin@example.com', 'role' => 'admin'],
            ['id' => 3, 'name' => 'Alex Buyer', 'email' => 'alex@example.com', 'role' => 'customer'],
        ];

        return view('admin.users.index', compact('users'));
    }
}
