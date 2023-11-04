<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contact\UpdateRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    private object $contact;

    public function __construct()
    {
        $this->contact = Contact::query()->count() > 0
            ? Contact::query()->find(1)
            : new Contact();
    }

    public function contactView(): View
    {
        return view('admin.contact.index', [
            'contact' => $this->contact
        ]);
    }

    public function contactUpdate(UpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Contact::query()->updateOrCreate($data, $data);
        session()->flash('success', 'Данные успешно обновлены');
        return redirect()->back();
    }
}
