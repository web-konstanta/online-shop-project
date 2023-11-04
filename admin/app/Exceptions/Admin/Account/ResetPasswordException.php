<?php

namespace App\Exceptions\Admin\Account;

use Exception;
use Illuminate\Http\RedirectResponse;

class ResetPasswordException extends Exception
{
    public function render(): RedirectResponse
    {
        session()->flash('error', $this->getMessage());
        return redirect()->back();
    }
}
