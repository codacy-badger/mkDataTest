<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $users = User::with('group')->get();

        return view('users/index', compact('users'));
    }

    public function edit(Request $request)
    {
        $user = User::where('id', '=', $request->id)->first();
        $groups = Group::all();

        return view('users/edit', compact(['user', 'groups']));
    }

    public function saveEdit(Request $request)
    {

    }
}
