<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PaymentController\MomoPayController;
use App\Http\Controllers\PaymentController\VnPayController;
use App\Http\Controllers\PaymentController\ZaloPayController;
use App\Http\Requests\OrderRequest;
use App\Models\AdminModel\ProductModel;
use App\Models\OrderDetailModel;
use App\Models\OrderModel;
use App\Models\ProductOrder;
use App\Models\ProductOrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = collect(session()->get('cart') ?? null)->all();
        $user = Auth::user() ?? null;
        if (empty($cart)) {
            return redirect()->back()->withErrors(['nullCart' => 'Giỏ hàng của bạn đang trống! Không có sản phẩm nào để thanh toán!']);
        }

        return view('customer.checkout', compact('cart', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $cart = session()->get('cart') ?? null;
        if (!empty($cart)) {
            $reqValidate = $request->validated();
            $reqValidate['total_price'] = $cart->finalTotalPriceCart;
            $reqValidate['coupon_id'] = $cart->coupon['id'] ?? null;
            $orderModel = new OrderModel();
            $order = $orderModel->create($reqValidate);

            $cartItem = $cart->itemCart;
            foreach ($cartItem as $key => $item) {
                $inforProduct = $item['productInfo'];
                $dataItem = [
                    'order_id' => $order->id,
                    'product_id' => $inforProduct['id'],
                    'image' => $inforProduct['image'],
                    'price' => $inforProduct['price'],
                    'quantity' => $item['quantity'],
                    'total_price' => $item['price']
                ];
                $orderDetailModel = new OrderDetailModel();
                $orderDetail = $orderDetailModel->create($dataItem);

                $attributeProduct = $inforProduct['attribute'];
                foreach ($attributeProduct as $value) {
                    $product =  ProductModel::find($item['productInfo']['id'])->first();
                    $product_attribute_id = $product->attributeProducts()->where('value', $value)->first()->id;
                    $dataAtt = [
                        'order_detail_id' => $orderDetail->id,
                        'product_attribute_id' => $product_attribute_id
                    ];
                    $productOrderModel = new ProductOrderModel();
                    $productOrderModel->create($dataAtt);
                }
            }

            $infoOrder = $order;
            switch ($request->typePay) {
                case 'momopay':
                    $momopay = new MomoPayController();
                    $result = $momopay->callApiMomo($infoOrder);
                    break;
                case 'vnpay':
                    $vnpay = new VnPayController();
                    $result = $vnpay->callApiVnpay($infoOrder);
                    break;
                case 'zalopay':
                    $zalopay = new ZaloPayController();
                    $result = $zalopay->callApiZalo($infoOrder);
                    break;
                default:
                    session()->flush('cart');
                    return redirect()->route('thankyou');
                    break;
            }
            if (!empty($result)) {
                session()->flush('cart');
                return redirect()->away($result);
            } else {
                return abort(403);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderModel  $orderModel
     * @return \Illuminate\Http\Response
     */
    public function show(OrderModel $orderModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderModel  $orderModel
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderModel $orderModel)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderModel  $orderModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderModel $orderModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderModel  $orderModel
     * @return \Illuminate\Http\Response
     */
    public function checkPayment(Request $request)
    {
        // $status = null;
        // if ($request->get('vnp_TransactionStatus')) {
        //     $status = 0;
        // }
        // if (!empty($request->get('errorCode'))) {
        //     $status = 0;
        // }
        dd($request->get('vnp_TransactionStatus'));
    }
}