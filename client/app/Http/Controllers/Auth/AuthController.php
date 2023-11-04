<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function registerView(): View
    {
        return view('auth.register');
    }

    public function loginView(): View
    {
        return view('auth.login');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $user = User::query()->create($request->validated());

        if ($user) auth()->login($user);

        return redirect()->route('cabinet.index');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (auth()->attempt($request->validated())) {
            return redirect()->route('cabinet.index');
        }

        session()->flash('error', 'Email или пароль введены неверно');
        return redirect()->back();
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('login-view');
    }
}
