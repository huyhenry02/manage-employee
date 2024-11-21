<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\RedirectResponse;
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

    public function postLogin(Request $request): ?RedirectResponse
    {
        try {
            $credentials = $request->only('email', 'password');
            if (auth()->attempt($credentials)) {
                return redirect()->route('employee.showIndex');
            }
            return redirect()->back();
        }catch (Exception $e) {
            return redirect()->route('showLogin')->with('error', $e->getMessage());
        }
    }

    public function postLogout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('showLogin');
    }
}
