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

    public function refuse($id)
    {
        $user = User::findorfail($id);
        if($user->approved_at != null)
        {
            $user->approved_at = null;
            $user->save();
        }
        User::destroy($id);
        return back();
    }

    public function ban($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        if(!$user->isAdmin())
        {
            if($user->approved_at != null)
            {
                $user->approved_at = null;
            }
            $user->banned_at = now();
            $user->save();
        }
        User::destroy($id);
        return back();
    }
}
