<?php //79a926e7bd05404c2601990567dc6495
/** @noinspection all */

namespace App\Models\AdminModel {

    use App\Models\CustomerModel\ReviewModel;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\Relations\HasOne;
    use Illuminate\Database\Eloquent\Relations\MorphToMany;
    use Illuminate\Notifications\DatabaseNotification;
    use Illuminate\Support\Carbon;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_AttributeModel_C;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_AttributeModel_QB;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_AttributeValueModel_C;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_AttributeValueModel_QB;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_BannerModel_C;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_BannerModel_QB;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_CategoryModel_C;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_CategoryModel_QB;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_CouponModel_C;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_CouponModel_QB;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_DiscountModel_C;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_DiscountModel_QB;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_ProductAttributeModel_C;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_ProductAttributeModel_QB;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_ProductDiscountModel_C;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_ProductDiscountModel_QB;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_ProductModel_C;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_ProductModel_QB;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_RoleModel_C;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_RoleModel_QB;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_UserModel_C;
    use LaravelIdea\Helper\App\Models\AdminModel\_IH_UserModel_QB;
    use LaravelIdea\Helper\App\Models\CustomerModel\_IH_ReviewModel_C;
    use LaravelIdea\Helper\App\Models\CustomerModel\_IH_ReviewModel_QB;
    use LaravelIdea\Helper\Illuminate\Notifications\_IH_DatabaseNotification_C;
    use LaravelIdea\Helper\Illuminate\Notifications\_IH_DatabaseNotification_QB;

    /**
     * @property int $id
     * @property string $name
     * @property bool $activated
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property _IH_AttributeValueModel_C|AttributeValueModel[] $getValue
     * @property-read int $get_value_count
     * @method HasMany|_IH_AttributeValueModel_QB getValue()
     * @method static _IH_AttributeModel_QB onWriteConnection()
     * @method _IH_AttributeModel_QB newQuery()
     * @method static _IH_AttributeModel_QB on(null|string $connection = null)
     * @method static _IH_AttributeModel_QB query()
     * @method static _IH_AttributeModel_QB with(array|string $relations)
     * @method _IH_AttributeModel_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_AttributeModel_C|AttributeModel[] all()
     * @foreignLinks id,\App\Models\AdminModel\AttributeValueModel,attribute_id
     * @mixin _IH_AttributeModel_QB
     */
    class AttributeModel extends Model {}

    /**
     * @property int $id
     * @property int $attribute_id
     * @property string $value
     * @property bool $activated
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property AttributeModel $attribute
     * @method HasOne|_IH_AttributeModel_QB attribute()
     * @method static _IH_AttributeValueModel_QB onWriteConnection()
     * @method _IH_AttributeValueModel_QB newQuery()
     * @method static _IH_AttributeValueModel_QB on(null|string $connection = null)
     * @method static _IH_AttributeValueModel_QB query()
     * @method static _IH_AttributeValueModel_QB with(array|string $relations)
     * @method _IH_AttributeValueModel_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_AttributeValueModel_C|AttributeValueModel[] all()
     * @ownLinks attribute_id,\App\Models\AdminModel\AttributeModel,id
     * @foreignLinks id,\App\Models\AdminModel\ProductAttributeModel,attribute_value_id
     * @mixin _IH_AttributeValueModel_QB
     */
    class AttributeValueModel extends Model {}

    /**
     * @property int $id
     * @property bool $type
     * @property string|null $title
     * @property string|null $content
     * @property string|null $link
     * @property string $image
     * @property bool $activated
     * @property Carbon $time_start
     * @property Carbon $time_end
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_BannerModel_QB onWriteConnection()
     * @method _IH_BannerModel_QB newQuery()
     * @method static _IH_BannerModel_QB on(null|string $connection = null)
     * @method static _IH_BannerModel_QB query()
     * @method static _IH_BannerModel_QB with(array|string $relations)
     * @method _IH_BannerModel_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_BannerModel_C|BannerModel[] all()
     * @mixin _IH_BannerModel_QB
     */
    class BannerModel extends Model {}

    /**
     * @property int $id
     * @property string $name
     * @property string $slug
     * @property bool $activated
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property _IH_ProductModel_C|ProductModel[] $productCategory
     * @property-read int $product_category_count
     * @method HasMany|_IH_ProductModel_QB productCategory()
     * @method static _IH_CategoryModel_QB onWriteConnection()
     * @method _IH_CategoryModel_QB newQuery()
     * @method static _IH_CategoryModel_QB on(null|string $connection = null)
     * @method static _IH_CategoryModel_QB query()
     * @method static _IH_CategoryModel_QB with(array|string $relations)
     * @method _IH_CategoryModel_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_CategoryModel_C|CategoryModel[] all()
     * @foreignLinks id,\App\Models\AdminModel\ProductModel,category_id
     * @mixin _IH_CategoryModel_QB
     */
    class CategoryModel extends Model {}

    /**
     * @property int $id
     * @property string $code
     * @property bool $type
     * @property string $value
     * @property int $stock
     * @property bool $activated
     * @property Carbon $time_start
     * @property Carbon $time_end
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_CouponModel_QB onWriteConnection()
     * @method _IH_CouponModel_QB newQuery()
     * @method static _IH_CouponModel_QB on(null|string $connection = null)
     * @method static _IH_CouponModel_QB query()
     * @method static _IH_CouponModel_QB with(array|string $relations)
     * @method _IH_CouponModel_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_CouponModel_C|CouponModel[] all()
     * @foreignLinks id,\App\Models\OrderModel,coupon_id
     * @mixin _IH_CouponModel_QB
     */
    class CouponModel extends Model {}

    /**
     * @property int $id
     * @property string $name
     * @property bool $type
     * @property string $value
     * @property bool $activated
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_DiscountModel_QB onWriteConnection()
     * @method _IH_DiscountModel_QB newQuery()
     * @method static _IH_DiscountModel_QB on(null|string $connection = null)
     * @method static _IH_DiscountModel_QB query()
     * @method static _IH_DiscountModel_QB with(array|string $relations)
     * @method _IH_DiscountModel_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_DiscountModel_C|DiscountModel[] all()
     * @foreignLinks id,\App\Models\AdminModel\ProductDiscountModel,discount_id
     * @mixin _IH_DiscountModel_QB
     */
    class DiscountModel extends Model {}

    /**
     * @property int $id
     * @property int $product_id
     * @property int $attribute_value_id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property AttributeValueModel $attributeValue
     * @method HasOne|_IH_AttributeValueModel_QB attributeValue()
     * @method static _IH_ProductAttributeModel_QB onWriteConnection()
     * @method _IH_ProductAttributeModel_QB newQuery()
     * @method static _IH_ProductAttributeModel_QB on(null|string $connection = null)
     * @method static _IH_ProductAttributeModel_QB query()
     * @method static _IH_ProductAttributeModel_QB with(array|string $relations)
     * @method _IH_ProductAttributeModel_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_ProductAttributeModel_C|ProductAttributeModel[] all()
     * @ownLinks product_id,\App\Models\AdminModel\ProductModel,id|attribute_value_id,\App\Models\AdminModel\AttributeValueModel,id
     * @foreignLinks id,\App\Models\ProductOrderModel,product_attribute_id
     * @mixin _IH_ProductAttributeModel_QB
     */
    class ProductAttributeModel extends Model {}

    /**
     * @property int $id
     * @property int $product_id
     * @property int $discount_id
     * @property bool $activated
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property DiscountModel $getDiscount
     * @method HasOne|_IH_DiscountModel_QB getDiscount()
     * @method static _IH_ProductDiscountModel_QB onWriteConnection()
     * @method _IH_ProductDiscountModel_QB newQuery()
     * @method static _IH_ProductDiscountModel_QB on(null|string $connection = null)
     * @method static _IH_ProductDiscountModel_QB query()
     * @method static _IH_ProductDiscountModel_QB with(array|string $relations)
     * @method _IH_ProductDiscountModel_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_ProductDiscountModel_C|ProductDiscountModel[] all()
     * @ownLinks product_id,\App\Models\AdminModel\ProductModel,id|discount_id,\App\Models\AdminModel\DiscountModel,id
     * @mixin _IH_ProductDiscountModel_QB
     */
    class ProductDiscountModel extends Model {}

    /**
     * @property int $id
     * @property string $name
     * @property int $category_id
     * @property string $slug
     * @property string $image
     * @property int $stock
     * @property int $price
     * @property string $description
     * @property bool $activated
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property _IH_ProductAttributeModel_C|ProductAttributeModel[] $attributeProduct
     * @property-read int $attribute_product_count
     * @method HasMany|_IH_ProductAttributeModel_QB attributeProduct()
     * @property _IH_AttributeValueModel_C|AttributeValueModel[] $attributeProducts
     * @property-read int $attribute_products_count
     * @method BelongsToMany|_IH_AttributeValueModel_QB attributeProducts()
     * @property CategoryModel $category
     * @method HasOne|_IH_CategoryModel_QB category()
     * @property ProductDiscountModel $discount
     * @method HasOne|_IH_ProductDiscountModel_QB discount()
     * @property _IH_ReviewModel_C|ReviewModel[] $review
     * @property-read int $review_count
     * @method HasMany|_IH_ReviewModel_QB review()
     * @method static _IH_ProductModel_QB onWriteConnection()
     * @method _IH_ProductModel_QB newQuery()
     * @method static _IH_ProductModel_QB on(null|string $connection = null)
     * @method static _IH_ProductModel_QB query()
     * @method static _IH_ProductModel_QB with(array|string $relations)
     * @method _IH_ProductModel_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_ProductModel_C|ProductModel[] all()
     * @ownLinks category_id,\App\Models\AdminModel\CategoryModel,id
     * @foreignLinks id,\App\Models\AdminModel\ProductAttributeModel,product_id|id,\App\Models\AdminModel\ProductDiscountModel,product_id|id,\App\Models\CustomerModel\ReviewModel,product_id|id,\App\Models\OrderDetailModel,product_id
     * @mixin _IH_ProductModel_QB
     */
    class ProductModel extends Model {}

    /**
     * @property int $id
     * @property string $name
     * @property bool $activated
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_RoleModel_QB onWriteConnection()
     * @method _IH_RoleModel_QB newQuery()
     * @method static _IH_RoleModel_QB on(null|string $connection = null)
     * @method static _IH_RoleModel_QB query()
     * @method static _IH_RoleModel_QB with(array|string $relations)
     * @method _IH_RoleModel_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_RoleModel_C|RoleModel[] all()
     * @foreignLinks id,\App\Models\AdminModel\UserModel,role_id
     * @mixin _IH_RoleModel_QB
     */
    class RoleModel extends Model {}

    /**
     * @property int $id
     * @property string $name
     * @property bool $gender
     * @property int $role_id
     * @property string $email
     * @property string $phone
     * @property Carbon $birth
     * @property string $avatar
     * @property string $password
     * @property string|null $address
     * @property int $city_id
     * @property int $district_id
     * @property int $ward_id
     * @property bool $activated
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property _IH_DatabaseNotification_C|DatabaseNotification[] $notifications
     * @property-read int $notifications_count
     * @method MorphToMany|_IH_DatabaseNotification_QB notifications()
     * @property _IH_DatabaseNotification_C|DatabaseNotification[] $readNotifications
     * @property-read int $read_notifications_count
     * @method MorphToMany|_IH_DatabaseNotification_QB readNotifications()
     * @property RoleModel $role
     * @method HasOne|_IH_RoleModel_QB role()
     * @property _IH_DatabaseNotification_C|DatabaseNotification[] $unreadNotifications
     * @property-read int $unread_notifications_count
     * @method MorphToMany|_IH_DatabaseNotification_QB unreadNotifications()
     * @method static _IH_UserModel_QB onWriteConnection()
     * @method _IH_UserModel_QB newQuery()
     * @method static _IH_UserModel_QB on(null|string $connection = null)
     * @method static _IH_UserModel_QB query()
     * @method static _IH_UserModel_QB with(array|string $relations)
     * @method _IH_UserModel_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_UserModel_C|UserModel[] all()
     * @ownLinks role_id,\App\Models\AdminModel\RoleModel,id
     * @foreignLinks id,\App\Models\OrderModel,admin_id
     * @mixin _IH_UserModel_QB
     */
    class UserModel extends Model {}
}
