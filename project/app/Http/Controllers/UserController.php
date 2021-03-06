<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): \Illuminate\Contracts\Support\Renderable
    {
        return view('components/user', [
            'users' => User::all()
        ]);
    }

}
