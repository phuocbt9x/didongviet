<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use App\Models\AdminModel\AttributeModel;
use App\Models\AdminModel\BannerModel;
use App\Models\AdminModel\CategoryModel;
use App\Models\AdminModel\ProductModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function home()
    {
        $banners = BannerModel::where('activated', 1)
            ->whereDate('time_start', '<=', now())
            ->whereDate('time_end', '>=', now())
            ->orderBy('id', 'DESC')
            ->get();
        return view('home', [
            'banners' => $banners
        ]);
    }

    public function login()
    {
        return view('customer.login');
    }

    public function register()
    {
        return view('customer.register');
    }

    public function shop()
    {
        return view('customer.shop');
    }

    public function cart()
    {
        return view('customer.cart');
    }

    public function checkout()
    {
        return view('customer.checkout');
    }

    public function detail(ProductModel $productModel)
    {
        $arrtribute = $productModel->attributeProducts->pluck('attribute_id');
        $attributes = AttributeModel::whereIn('id', $arrtribute)->get();
        return view('customer.detail', compact('productModel', 'attributes'));
    }
}
