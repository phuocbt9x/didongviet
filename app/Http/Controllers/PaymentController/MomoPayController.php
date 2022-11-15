<?php

namespace App\Http\Controllers\PaymentController;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use Illuminate\Http\Request;

class MomoPayController extends Controller
{
    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function callApiMomo($infoOrder)
    {
        $endPoint = env('MOMO_ENDPOINT');
        $partnerCode = env('MOMO_PARTNER_CODE');
        $accessKey = env('MOMO_ACCESS_KEY');
        $secretKey = env('MOMO_SECRET_KEY');
        $orderInfo = "Thanh toán đơn hàng có mã " . $infoOrder->id;
        $amount = $infoOrder->total_price . "";
        $orderId = $infoOrder->id . "";
        $redirectUrl = route('momo.hookCallBack');
        $ipnUrl = route('momo.hookCallBack');
        $extraData = "";
        $requestId = time() . "";
        $requestType = "captureWallet";
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount .
            "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId .
            "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl .
            "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endPoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        if (empty($jsonResult['payUrl'])) {
            return redirect()->route('shop.checkout')
                ->withErrors(['errorMessage' => 'Thanh toán đơn hàng không thành công! Vui lòng thử lại!']);
        }
        return $jsonResult['payUrl'];
    }

    public function hookCallBack()
    {
        if (request('resultCode') == 0) {
            $orderId = request('orderId');
            $order = OrderModel::find($orderId);
            if ($order->payment_type == 0) {
                $order->update([
                    'payment_type' => 1,
                    'payment' => 'MOMO'
                ]);
                return view('customer.thankyou');
            }
        }
        dd(request('orderId'));
        return redirect()->route('shop.checkout')
            ->withErrors(['errorMessage' => 'Thanh toán đơn hàng không thành công! Vui lòng thử lại!']);
    }
}
