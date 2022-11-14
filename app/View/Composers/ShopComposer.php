<?php

namespace App\View\Composers;

use App\Models\AdminModel\CategoryModel;
use App\Models\AdminModel\ProductModel;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class ShopComposer
{
    public $page = null;
    public $category = null;
    public $key = null;
    public $price = null;

    public  function __construct()
    {
        $this->page = request()->page;
        $this->category = request()->category;
        $this->key = request()->key;
    }

    public function compose(View $view)
    {
        if (!empty($categories = CategoryModel::where('activated', 1)
            ->orderBy('id', 'DESC')
            ->get())) {
            $category = $categories->firstWhere('slug', $this->category);
            $view->with('categories', $categories);
            if (!empty(request()->category)) {
                $view->with('categorySlug', request()->category);
            }
        }

        if (!is_null(request()->price)) {
            $this->price = array_map('intval', explode('-', str_replace(".", "", str_replace("₫", "", request()->price))));
            $view->with('priceFillter', implode(',', $this->price));
        }

        //show sản phẩm theo danh mục ở trang home
        $productsCategory = ProductModel::where('activated', 1)->get();

        //show sản phẩm bán chạy ở trang home có kèm theo key search
        $products = ProductModel::where('activated', 1)
            ->when($this->key, function ($query, $key) {
                $query->where('name', 'LIKE', "%{$key}%");
            })
            ->get();

        //show sản phẩm bán chạy ở trang shop có kèm theo key search, category, paginate
        if (Route::currentRouteName() == 'shop.shop') {
            $appends = [
                'category' => $this->category,
                'key' => $this->key,
                'page' => $this->page
            ];

            if (!empty($this->price)) {
                $appends['price'] = implode('-', $this->price);
            }

            $products = ProductModel::where('activated', 1)
                ->when($category, function ($query, $category) {
                    $query->where('category_id', $category->id);
                })
                ->when($this->key, function ($query, $key) {
                    $query->where('name', 'LIKE', "%{$key}%");
                })
                ->when($this->price, function ($query, $price) {
                    $query->whereBetween('price', $price);
                })
                ->paginate(config('me.paginate'))
                ->withQueryString()
                ->appends($appends);
        }

        $view->with([
            'countProducts' => ProductModel::where('activated', 1)->count(),
            'productsCategory' => $productsCategory,
            'products' => $products
        ]);
    }
}
