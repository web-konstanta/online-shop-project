<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class LogoutController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        auth()->logout();
        session()->flash('logout', 'You logout successfully');
        return redirect()->route('login-view');
    }
}
