<?php

namespace App\Http\Controllers;

use App\Services\ImageService;

class BaseController extends Controller
{
    public function __construct(
        protected ImageService $imageService
    ){}
}
