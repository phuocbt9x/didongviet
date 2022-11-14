<?php //c5cc3068284bfad3a2e49318516b681c
/** @noinspection all */

namespace App\Models {

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Carbon;
    use LaravelIdea\Helper\App\Models\_IH_OrderDetailModel_C;
    use LaravelIdea\Helper\App\Models\_IH_OrderDetailModel_QB;
    use LaravelIdea\Helper\App\Models\_IH_OrderModel_C;
    use LaravelIdea\Helper\App\Models\_IH_OrderModel_QB;
    use LaravelIdea\Helper\App\Models\_IH_ProductOrderModel_C;
    use LaravelIdea\Helper\App\Models\_IH_ProductOrderModel_QB;

    /**
     * @property int $id
     * @property int $order_id
     * @property int $product_id
     * @property int $price
     * @property int $quantity
     * @property int $total_price
     * @property string $image
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_OrderDetailModel_QB onWriteConnection()
     * @method _IH_OrderDetailModel_QB newQuery()
     * @method static _IH_OrderDetailModel_QB on(null|string $connection = null)
     * @method static _IH_OrderDetailModel_QB query()
     * @method static _IH_OrderDetailModel_QB with(array|string $relations)
     * @method _IH_OrderDetailModel_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_OrderDetailModel_C|OrderDetailModel[] all()
     * @ownLinks order_id,\App\Models\OrderModel,id|product_id,\App\Models\AdminModel\ProductModel,id
     * @foreignLinks id,\App\Models\ProductOrderModel,order_detail_id
     * @mixin _IH_OrderDetailModel_QB
     */
    class OrderDetailModel extends Model {}

    /**
     * @property int $id
     * @property string $member
     * @property string $email
     * @property string $phone
     * @property string|null $address
     * @property int $city_id
     * @property int $district_id
     * @property int $ward_id
     * @property string|null $note
     * @property bool $status
     * @property bool $payment_type
     * @property string|null $payment
     * @property int|null $admin_id
     * @property int $total_price
     * @property int|null $coupon_id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_OrderModel_QB onWriteConnection()
     * @method _IH_OrderModel_QB newQuery()
     * @method static _IH_OrderModel_QB on(null|string $connection = null)
     * @method static _IH_OrderModel_QB query()
     * @method static _IH_OrderModel_QB with(array|string $relations)
     * @method _IH_OrderModel_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_OrderModel_C|OrderModel[] all()
     * @ownLinks admin_id,\App\Models\AdminModel\UserModel,id|coupon_id,\App\Models\AdminModel\CouponModel,id
     * @foreignLinks id,\App\Models\OrderDetailModel,order_id
     * @mixin _IH_OrderModel_QB
     */
    class OrderModel extends Model {}

    /**
     * @property int $id
     * @property int $order_detail_id
     * @property int $product_attribute_id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_ProductOrderModel_QB onWriteConnection()
     * @method _IH_ProductOrderModel_QB newQuery()
     * @method static _IH_ProductOrderModel_QB on(null|string $connection = null)
     * @method static _IH_ProductOrderModel_QB query()
     * @method static _IH_ProductOrderModel_QB with(array|string $relations)
     * @method _IH_ProductOrderModel_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_ProductOrderModel_C|ProductOrderModel[] all()
     * @ownLinks order_detail_id,\App\Models\OrderDetailModel,id|product_attribute_id,\App\Models\AdminModel\ProductAttributeModel,id
     * @mixin _IH_ProductOrderModel_QB
     */
    class ProductOrderModel extends Model {}
}
