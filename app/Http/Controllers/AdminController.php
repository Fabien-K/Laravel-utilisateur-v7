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

    public function approved($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->approved_at = now();

        if($user->deleted_at != null)
        {
            $user->deleted_at = null;
        }
        $user->save();
        return back();
    }
}
