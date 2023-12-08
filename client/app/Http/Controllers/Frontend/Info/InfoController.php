<?php

namespace App\Http\Controllers\Frontend\Info;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\View\View;

class InfoController extends Controller
{
    public function contacts(): View
    {
        $info = Contact::query()->find(1) ?? new Contact();
        return view('info.contacts', compact('info'));
    }
}
