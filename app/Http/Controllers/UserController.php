<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('users.show', [
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('users.edit', [
            'user' => $user
        ]);
    }
}
