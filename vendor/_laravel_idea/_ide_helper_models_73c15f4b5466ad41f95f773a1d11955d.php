<?php //6c9accfb05344b2f2a4dbaa56f3565ea
/** @noinspection all */

namespace App\Models\CustomerModel {

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\MorphToMany;
    use Illuminate\Notifications\DatabaseNotification;
    use Illuminate\Support\Carbon;
    use LaravelIdea\Helper\App\Models\CustomerModel\_IH_MemberModel_C;
    use LaravelIdea\Helper\App\Models\CustomerModel\_IH_MemberModel_QB;
    use LaravelIdea\Helper\App\Models\CustomerModel\_IH_ReviewModel_C;
    use LaravelIdea\Helper\App\Models\CustomerModel\_IH_ReviewModel_QB;
    use LaravelIdea\Helper\App\Models\CustomerModel\_IH_ShopModel_C;
    use LaravelIdea\Helper\App\Models\CustomerModel\_IH_ShopModel_QB;
    use LaravelIdea\Helper\Illuminate\Notifications\_IH_DatabaseNotification_C;
    use LaravelIdea\Helper\Illuminate\Notifications\_IH_DatabaseNotification_QB;

    /**
     * @property int $id
     * @property string|null $type
     * @property string $name
     * @property string|null $email
     * @property string|null $phone
     * @property Carbon|null $birth
     * @property string|null $avatar
     * @property string|null $password
     * @property string|null $address
     * @property int|null $city_id
     * @property int|null $district_id
     * @property int|null $ward_id
     * @property bool $activated
     * @property string|null $activation_token
     * @property string|null $remember_token
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property _IH_DatabaseNotification_C|DatabaseNotification[] $notifications
     * @property-read int $notifications_count
     * @method MorphToMany|_IH_DatabaseNotification_QB notifications()
     * @property _IH_DatabaseNotification_C|DatabaseNotification[] $readNotifications
     * @property-read int $read_notifications_count
     * @method MorphToMany|_IH_DatabaseNotification_QB readNotifications()
     * @property _IH_DatabaseNotification_C|DatabaseNotification[] $unreadNotifications
     * @property-read int $unread_notifications_count
     * @method MorphToMany|_IH_DatabaseNotification_QB unreadNotifications()
     * @method static _IH_MemberModel_QB onWriteConnection()
     * @method _IH_MemberModel_QB newQuery()
     * @method static _IH_MemberModel_QB on(null|string $connection = null)
     * @method static _IH_MemberModel_QB query()
     * @method static _IH_MemberModel_QB with(array|string $relations)
     * @method _IH_MemberModel_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_MemberModel_C|MemberModel[] all()
     * @mixin _IH_MemberModel_QB
     */
    class MemberModel extends Model {}

    /**
     * @property int $id
     * @property string $name
     * @property string $email
     * @property int $star
     * @property string $comment
     * @property int $product_id
     * @property bool $activated
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_ReviewModel_QB onWriteConnection()
     * @method _IH_ReviewModel_QB newQuery()
     * @method static _IH_ReviewModel_QB on(null|string $connection = null)
     * @method static _IH_ReviewModel_QB query()
     * @method static _IH_ReviewModel_QB with(array|string $relations)
     * @method _IH_ReviewModel_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_ReviewModel_C|ReviewModel[] all()
     * @ownLinks product_id,\App\Models\AdminModel\ProductModel,id
     * @mixin _IH_ReviewModel_QB
     */
    class ReviewModel extends Model {}

    /**
     * @method static _IH_ShopModel_QB onWriteConnection()
     * @method _IH_ShopModel_QB newQuery()
     * @method static _IH_ShopModel_QB on(null|string $connection = null)
     * @method static _IH_ShopModel_QB query()
     * @method static _IH_ShopModel_QB with(array|string $relations)
     * @method _IH_ShopModel_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_ShopModel_C|ShopModel[] all()
     * @mixin _IH_ShopModel_QB
     */
    class ShopModel extends Model {}
}
