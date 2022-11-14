<?php

namespace App\View\Composers;

use App\Models\CartModel;
use Illuminate\View\View;

class CartComposer
{


    public function compose(View $view)
    {
        if (session()->has('cart')) {
            $view->with('cart', session()->get('cart'));
        }
    }
}
