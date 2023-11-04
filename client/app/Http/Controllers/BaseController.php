<?php

namespace App\Http\Controllers;

use App\Services\Basket\BasketService;
use App\Services\Order\OrderService;

class BaseController extends Controller
{
    public function __construct(
        protected BasketService $basketService,
        protected OrderService $orderService
    ){}
}
