<?php

namespace App\Http\Controllers\PaymentController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ZaloPayController extends Controller
{
    public $appId = null;
    public $key1 = null;
    public $key2 = null;
    public $endPoint = null;
    public $bankEndPoint = null;

    public function __construct()
    {
        $this->appId = env('ZALO_APP_ID');
        $this->key1 = env('ZALO_KEY_1');
        $this->key2 = env('ZALO_KEY_2');
        $this->endPoint = env('ZALO_ENDPOINT');
        $this->bankEndPoint = env('BANK_ENDPOINT');
    }
    public function callBankList()
    {

        $reqtime = round(microtime(true) * 1000); // miliseconds
        $params = [
            "appid" => $this->appId,
            "reqtime" => $reqtime,
            "mac" => hash_hmac("sha256", $this->appId . "|" . $reqtime, $this->key1) // appid|reqtime
        ];
        $resp = file_get_contents($this->bankEndPoint . "?" . http_build_query($params));
        $result = json_decode($resp, true);
        dd($result);
        foreach ($result as $key => $value) {
            echo "$key: $value<br>";
        }
    }

    public function callApiZalo($infoOrder)
    {
        $endPoint = $this->endPoint;
        $appId = $this->appId;
        $key1 = $this->key1;
        $key2 = $this->key2;

        $callbackUrl = route('zalo.hookCallBack');
        $appUser = $infoOrder->member;
        $appTransId = date('ymd') . '_' . $infoOrder->id;
        $appTime = round(microtime(true) * 1000);
        $amount = $infoOrder->total_price;
        $description = "Thanh toán đơn hàng có mã $infoOrder->id";
        $embeddata = '{}'; // Merchant's data
        $bankCode = "zalopayapp";
        $channel = "39";
        $items = '[]';
        $order = [
            "app_id" => $appId,
            "app_time" => $appTime, // miliseconds
            "app_trans_id" => $appTransId, // translation missing: vi.docs.shared.sample_code.comments.app_trans_id
            "app_user" => $appUser,
            "embed_data" => $embeddata,
            "item" => $items,
            "amount" => $amount,
            "description" => $description,
            "bank_code" => $bankCode,
            "callback_url" => $callbackUrl,
            "channel" => $channel
        ];

        // appid|app_trans_id|appuser|amount|apptime|embeddata|item
        $data = $order["app_id"] . "|" . $order["app_trans_id"] . "|" . $order["app_user"] . "|" . $order["amount"]
            . "|" . $order["app_time"] . "|" . $order["embed_data"] . "|" . $order["item"];
        $order["mac"] = hash_hmac("sha256", $data, $key1);

        $context = stream_context_create([
            "http" => [
                "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                "method" => "POST",
                "content" => http_build_query($order)
            ]
        ]);

        $resp = file_get_contents($endPoint, false, $context);
        $result = json_decode($resp, true);
        return $result['order_url'];
    }

    public function hookCallBack()
    {
        dd(request());
    }
}
