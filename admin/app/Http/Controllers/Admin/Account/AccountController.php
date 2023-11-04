<?php

namespace App\Http\Controllers\Admin\Account;

use App\Exceptions\Admin\Account\ResetPasswordException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Account\ResetPasswordRequest;
use App\Http\Requests\Admin\Account\SettingsRequest;
use Illuminate\Http\RedirectResponse;
use \Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AccountController extends Controller
{
    private function getAdmin(): Authenticatable
    {
        return auth()->user();
    }

    public function settings(): View
    {
        $admin = $this->getAdmin();
        return view('admin.account.settings', compact('admin'));
    }

    public function updateSettings(SettingsRequest $request): RedirectResponse
    {
        $this->getAdmin()->update($request->validated());
        session()->flash('success', 'Данные успешно обновлены');
        return redirect()->back();
    }

    public function resetPassword(): View
    {
        return view('admin.account.reset-password');
    }

    /**
    * @throws ResetPasswordException
    */
    public function updatePassword(ResetPasswordRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (!Hash::check($data['current_password'], $this->getAdmin()->password)) {
            throw new ResetPasswordException('Текущий пароль введен не верно');
        }

        $this->getAdmin()->update(['password' => $data['password']]);

        session()->flash('success', 'Пароль успешно обновлен');
        return redirect()->back();
    }
}
