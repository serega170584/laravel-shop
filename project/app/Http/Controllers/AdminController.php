<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;

class AdminController extends Controller
{
    public function index(): Renderable
    {
        return view('components/user', [
            'users' => User::all()
        ]);
    }
}
