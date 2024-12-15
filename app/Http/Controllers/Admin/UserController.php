<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', false)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users.index', compact('users'));
    }
}
