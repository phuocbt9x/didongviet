<?php

namespace App\Http\Controllers\PaymentController;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use Illuminate\Http\Request;

class MomoPayController extends Controller
{
    public function execPostRequest($url, $data)
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

        $endpoint = env('MOMO_ENDPOINT');
        $partnerCode = env('MOMO_PARTNER_CODE');
        $accessKey = env('MOMO_ACCESS_KEY');
        $serectKey = env('MOMO_SECRET_KEY');
        $orderId = "$infoOrder->id";
        $orderInfo = "Thanh toán đơn hàng có mã $orderId";
        $amount = "$infoOrder->total_price";
        $bankCode = 'SML';
        $returnUrl = route('momo.hookCallBack');
        $requestId = time() . "";
        $requestType = "captureMoMoWallet";
        $extraData = "";
        $notifyUrl = route('momo.hookCallBack');
        $lang = 'vn';
        // echo $serectkey;die;
        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey .
            "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId .
            "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl .
            "&notifyUrl=" . $notifyUrl . "&extraData=" . $extraData;
        $signature = hash_hmac("sha256", $rawHash, $serectKey);

        $data =  array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'bankCode' => $bankCode,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature,
            'notifyUrl' => $notifyUrl,
            'lang' => $lang
        );

        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true); // decode json
        if (empty($jsonResult['payUrl'])) {
            return redirect()->back();
        }
        return $jsonResult['payUrl'];
    }

    public function hookCallBack()
    {
        if (request('errorCode') == 00) {
            $orderId = request('orderId');
            $order = OrderModel::find($orderId);
            if ($order->payment_type == 0) {
                $order->update([
                    'payment_type' => 1,
                    'payment' => 'MOMO'
                ]);
                return redirect()->route('shop.home');
            }
        }
        return redirect()->route('shop.checkout')
            ->withErrors(['errorMessage' => 'Thanh toán đơn hàng không thành công! Vui lòng thử lại!']);
    }
}
