<?php

namespace App\Providers;

use App\View\Composers\CartComposer;
use App\View\Composers\ShopComposer;
use App\View\Composers\TitleComposer;
use App\View\Composers\TitleCustomerComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('admin.layout.main', TitleComposer::class);
        View::composer(['customer.layout.main', 'customer.layout.header'], TitleCustomerComposer::class);
        View::composer(['home', 'customer.shop'], ShopComposer::class);
        View::composer(['customer.layout.header', 'customer.cart', 'customer.checkout'], CartComposer::class);
    }
}
