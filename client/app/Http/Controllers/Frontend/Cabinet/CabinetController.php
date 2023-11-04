<?php

namespace App\Http\Controllers\Frontend\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cabinet\UpdatePersonalRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CabinetController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();
        return view('cabinet.index', compact('user'));
    }

    public function personalDataView(): View
    {
        $user = auth()->user();
        return view('cabinet.personal', compact('user'));
    }

    public function personalDataUpdate(UpdatePersonalRequest $request): RedirectResponse
    {
        $user = auth()->user();
        $user->update($request->validated());
        session()->flash('success', 'Данные успешно обновлены');
        return redirect()->back();
    }
}
