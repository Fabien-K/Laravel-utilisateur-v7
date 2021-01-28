<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::withTrashed()->paginate(10);
        return view('admin.index', compact('users'));
    }
}
