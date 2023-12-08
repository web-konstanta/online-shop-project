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

    public function paymentDelivery(): View
    {
        return view('info.payment-delivery');
    }

    public function opt(): View
    {
        return view('info.opt');
    }

    public function dropShipping(): View
    {
        return view('info.drop-shipping');
    }
}
