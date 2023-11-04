<?php

namespace App\Exceptions\Admin\Contact;

use Exception;
use Illuminate\Http\RedirectResponse;

class PhoneException extends Exception
{
    public function render(): RedirectResponse
    {
        session()->flash('error', $this->getMessage());
        return redirect()->back();
    }
}
