<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    public $table = 'tbl_order';
    public $fillable = [
        'member_id', 'member', 'email', 'phone', 'address', 'city_id', 'district_id', 'ward_id',
        'note', 'status', 'payment_type', 'payment', 'admnin_id', 'total_price', 'coupon_id'
    ];

    public function statusOrder()
    {
        switch ($this->status) {
            case '1':
                return 'Đang chuẩn bị hàng!';
                break;
            case '2':
                return 'Đơn hàng đang được giao!';
                break;
            case '3':
                return 'Đơn hàng được giao thành công!';
                break;
            case '3':
                return 'Đơn hàng đã được hủy!';
                break;
            default:
                return 'Chờ xác nhận đơn hàng!';
                break;
        }
    }

    public function statusPayment()
    {
        switch ($this->payment_type) {
            case '1':
                return 'Đã thanh toán!';
                break;
            default:
                return 'Chưa thanh toán!';
                break;
        }
    }
}
