<?php

namespace App\Http\Controllers;

use App\Models\AdminModel\AttributeModel;
use App\Models\AdminModel\AttributeValueModel;
use App\Models\AdminModel\CouponModel;
use App\Models\AdminModel\ProductModel;
use App\Models\CartModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CartController extends Controller
{

    public function applyCoupon(Request $request)
    {
        $couponInfo = null;

        if ($request->post('coupon') != null) {
            $coupon = Str::upper($request->post('coupon'));
            $checkCoupon  = CouponModel::where([
                ['code', $coupon],
                ['stock', '>', 0]
            ])
                ->whereDate('time_start', '<=', date('Y-m-d', strtotime(now())))
                ->whereDate('time_end', '>', date('Y-m-d', strtotime(now())))
                ->first();

            if (!empty($checkCoupon)) {
                $couponInfo = [
                    'id' => $checkCoupon->id,
                    'code' => $checkCoupon->code,
                    'type' => $checkCoupon->type,
                    'value' => $checkCoupon->value
                ];
            }

            $cartOld = Session::get('cart') ?? null;
            $cartModel = new CartModel($cartOld);
            $cartModel->applyCoupon($couponInfo);
            session()->put('cart', $cartModel);

            if (!empty($checkCoupon)) {
                return response()->json([
                    'statusCode' => 200,
                    'data' => Session::get('cart'),
                    'message' => 'Áp mã giảm giá thành công!'
                ]);
            }
            return response()->json([
                'statusCode' => 200,
                'data' => Session::get('cart'),
                'messageError' => 'Mã giảm giá không tồn tại, hoặc hết số lượng áp dụng!'
            ]);
        }

        $cartOld = Session::get('cart') ?? null;
        $cartModel = new CartModel($cartOld);
        $cartModel->applyCoupon($couponInfo);
        session()->put('cart', $cartModel);
        return response()->json([
            'statusCode' => 200,
            'data' => Session::get('cart')
        ]);
    }

    public function addCart(Request $request)
    {
        $product = ProductModel::find($request->product_id);
        $attributes = $request->attribute;
        $attributeInfo = [];
        foreach ($attributes as $value) {
            $attribute = AttributeModel::find($value)->name;
            $attributeValue = AttributeValueModel::find($request->$value)->value;
            $attributeInfo[$attribute] = $attributeValue;
        }
        $productInfo = [
            'id' => $request->product_id,
            'name' => $product->name,
            'slug' => $product->slug,
            'attribute' => $attributeInfo,
            'image' => $product->image,
            'price' => $request->price,
            'quantity' => $request->quantity
        ];

        if (!empty($request)) {
            $cartOld = Session::get('cart') ?? null;
            $cartModel = new CartModel($cartOld);
            $cartModel->addToCart($productInfo);
            Session::put('cart', $cartModel);
        }
        return response()->json([
            'statusCode' => 200,
            'data' => Session::get('cart')
        ]);
    }

    public function updateCart(Request $request)
    {
        if (session()->has('cart')) {
            $oldCart  = Session::get('cart') ?? null;
            $cartModel = new CartModel($oldCart);
            $cartModel->updateCart($request);
            Session::put('cart', $cartModel);
            return response()->json([
                'statusCode' => 200,
                'data' => Session::get('cart')
            ]);
        }
    }

    public function deleteItemCart($idItemCart)
    {
        $cartOld = Session::get('cart') ?? null;
        $cartModel = new CartModel($cartOld);
        $cartModel->deleteItem($idItemCart);
        if (count($cartModel->itemCart) >= 0) {
            Session::put('cart', $cartModel);
            return response()->json([
                'statusCode' => 200,
                'data' => Session::get('cart')
            ]);
        }
    }
}
