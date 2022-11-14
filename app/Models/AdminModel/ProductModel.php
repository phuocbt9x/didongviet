<?php

namespace App\Models\AdminModel;

use App\Models\CustomerModel\ReviewModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_product';
    protected $fillable = [
        'category_id', 'name', 'slug', 'image', 'stock', 'price', 'description', 'activated'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->hasOne(CategoryModel::class, 'id', 'category_id');
    }

    public function attributeProduct()
    {
        return $this->hasMany(ProductAttributeModel::class, 'product_id', 'id');
    }

    public function attributeProducts()
    {
        return $this->belongsToMany(
            AttributeValueModel::class,
            'tbl_product_attribute',
            'product_id',
            'attribute_value_id',
            'id',
            'id'
        );
    }

    public function discount()
    {
        return $this->hasOne(ProductDiscountModel::class, 'product_id', 'id');
    }

    public function priceSale()
    {
        if (!empty($this->discount)) {
            $typeSale = $this->discount->getDiscount->type;
            $valueSale = $this->discount->getDiscount->value;
            $priceProduct = $this->price;
            switch ($typeSale) {
                case 0:
                    $priceSale = (int)$priceProduct * ((100 - (int)$valueSale) / 100);
                    return $priceSale;
                    break;
                case 1:
                    $priceSale = (int)$priceProduct - (int)$valueSale;
                    return $priceSale;
                    break;
                default:
                    break;
            }
        }
        return $this->price;
    }

    public function review()
    {
        return $this->hasMany(ReviewModel::class, 'product_id', 'id');
    }

    public function productNew()
    {
        $timeNow = Carbon::parse(Carbon::today())->timestamp;
        $time30days = Carbon::parse(Carbon::today()->subDays(30))->timestamp;
        $productTimeCreate = Carbon::parse($this->created_at)->timestamp;
        if ($time30days <= $productTimeCreate && $productTimeCreate <= $timeNow) {
            return true;
        }
        return false;
    }
}
