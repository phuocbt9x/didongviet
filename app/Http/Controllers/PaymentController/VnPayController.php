<?php

namespace App\Http\Controllers\PaymentController;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;

class VnPayController extends Controller
{
    public function callApiVnpay($infoOrder)
    {
        $vnp_Version = "2.1.0";
        $vnp_ReturnUrl = route('vnpay.hookCallBack');
        $vnp_Url = env('VNPAY_URL');
        $vnp_TmnCode =  env('VNPAY_TMNCODE'); //Mã website tại VNPAY 
        $vnp_HashSecret =  env('VNPAY_HASHSECRET'); //Chuỗi bí mật

        $vnp_TxnRef = $infoOrder->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán đơn hàng có mã $vnp_TxnRef";
        $vnp_OrderType = "110000";
        $vnp_Amount = $infoOrder->total_price * 100;
        $vnp_Locale = "vn";
        $vnp_IpAddr = request()->ip();
        $vnp_Command = "pay";

        $inputData = array(
            "vnp_Version" => $vnp_Version,
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => $vnp_Command,
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_ReturnUrl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        return $vnp_Url;
    }

    public function hookCallBack()
    {
        if (request('vnp_TransactionStatus') == 00) {
            $orderId = request('vnp_TxnRef');
            $order = OrderModel::find($orderId);
            if ($order->payment_type == 0) {
                $order->update([
                    'payment_type' => 1,
                    'payment' => 'VNPAY'
                ]);
                return view('customer.thankyou');
            }
        }
        return redirect()->route('shop.checkout')->withErrors(['errorMessage' => 'Thanh toán đơn hàng không thành công! Vui lòng thử lại!']);
    }
}
