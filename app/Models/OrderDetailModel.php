<?php

namespace App\Models;

use App\Models\AdminModel\AttributeValueModel;
use App\Models\AdminModel\ProductModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    use HasFactory;
    public $table = 'tbl_order_detail';
    public $fillable = [
        'order_id', 'product_id', 'image',
        'price', 'quantity', 'total_price'
    ];

    public function infoProduct()
    {
        return $this->hasOne(ProductModel::class, 'id', 'product_id');
    }

    public function attributeProduct()
    {
        return $this->hasMany(ProductOrderModel::class, 'order_detail_id', 'id');
    }
}
