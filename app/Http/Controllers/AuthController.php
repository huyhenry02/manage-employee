<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin(): View|Factory|Application
    {
        return view('auth.login');
    }
}
