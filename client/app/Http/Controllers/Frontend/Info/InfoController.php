<?php

namespace App\Http\Controllers\Frontend\Info;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class InfoController extends Controller
{
    public function contacts(): View
    {
        return view('info.contacts');
    }
}
