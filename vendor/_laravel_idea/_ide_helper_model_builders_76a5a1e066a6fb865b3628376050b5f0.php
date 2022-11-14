<?php //f7e42cc9cfc169b91d9560c491aff9cb
/** @noinspection all */

namespace LaravelIdea\Helper\App\Models {

    use App\Models\OrderDetailModel;
    use App\Models\OrderModel;
    use App\Models\ProductOrderModel;
    use Illuminate\Contracts\Support\Arrayable;
    use Illuminate\Database\Query\Expression;
    use Illuminate\Pagination\LengthAwarePaginator;
    use Illuminate\Pagination\Paginator;
    use LaravelIdea\Helper\_BaseBuilder;
    use LaravelIdea\Helper\_BaseCollection;

    /**
     * @method OrderDetailModel|null getOrPut($key, $value)
     * @method OrderDetailModel|$this shift(int $count = 1)
     * @method OrderDetailModel|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method OrderDetailModel|$this pop(int $count = 1)
     * @method OrderDetailModel|null pull($key, \Closure $default = null)
     * @method OrderDetailModel|null last(callable $callback = null, \Closure $default = null)
     * @method OrderDetailModel|$this random(callable|int|null $number = null)
     * @method OrderDetailModel|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method OrderDetailModel|null get($key, \Closure $default = null)
     * @method OrderDetailModel|null first(callable $callback = null, \Closure $default = null)
     * @method OrderDetailModel|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method OrderDetailModel|null find($key, $default = null)
     * @method OrderDetailModel[] all()
     */
    class _IH_OrderDetailModel_C extends _BaseCollection {
        /**
         * @param int $size
         * @return OrderDetailModel[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_OrderDetailModel_QB whereId($value)
     * @method _IH_OrderDetailModel_QB whereOrderId($value)
     * @method _IH_OrderDetailModel_QB whereProductId($value)
     * @method _IH_OrderDetailModel_QB wherePrice($value)
     * @method _IH_OrderDetailModel_QB whereQuantity($value)
     * @method _IH_OrderDetailModel_QB whereTotalPrice($value)
     * @method _IH_OrderDetailModel_QB whereImage($value)
     * @method _IH_OrderDetailModel_QB whereCreatedAt($value)
     * @method _IH_OrderDetailModel_QB whereUpdatedAt($value)
     * @method OrderDetailModel baseSole(array|string $columns = ['*'])
     * @method OrderDetailModel create(array $attributes = [])
     * @method _IH_OrderDetailModel_C|OrderDetailModel[] cursor()
     * @method OrderDetailModel|null|_IH_OrderDetailModel_C|OrderDetailModel[] find($id, array|string $columns = ['*'])
     * @method _IH_OrderDetailModel_C|OrderDetailModel[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method OrderDetailModel|_IH_OrderDetailModel_C|OrderDetailModel[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method OrderDetailModel|_IH_OrderDetailModel_C|OrderDetailModel[] findOrFail($id, array|string $columns = ['*'])
     * @method OrderDetailModel|_IH_OrderDetailModel_C|OrderDetailModel[] findOrNew($id, array|string $columns = ['*'])
     * @method OrderDetailModel first(array|string $columns = ['*'])
     * @method OrderDetailModel firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method OrderDetailModel firstOrCreate(array $attributes = [], array $values = [])
     * @method OrderDetailModel firstOrFail(array|string $columns = ['*'])
     * @method OrderDetailModel firstOrNew(array $attributes = [], array $values = [])
     * @method OrderDetailModel firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method OrderDetailModel forceCreate(array $attributes)
     * @method _IH_OrderDetailModel_C|OrderDetailModel[] fromQuery(string $query, array $bindings = [])
     * @method _IH_OrderDetailModel_C|OrderDetailModel[] get(array|string $columns = ['*'])
     * @method OrderDetailModel getModel()
     * @method OrderDetailModel[] getModels(array|string $columns = ['*'])
     * @method _IH_OrderDetailModel_C|OrderDetailModel[] hydrate(array $items)
     * @method OrderDetailModel make(array $attributes = [])
     * @method OrderDetailModel newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|OrderDetailModel[]|_IH_OrderDetailModel_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|OrderDetailModel[]|_IH_OrderDetailModel_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method OrderDetailModel sole(array|string $columns = ['*'])
     * @method OrderDetailModel updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_OrderDetailModel_QB extends _BaseBuilder {}

    /**
     * @method OrderModel|null getOrPut($key, $value)
     * @method OrderModel|$this shift(int $count = 1)
     * @method OrderModel|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method OrderModel|$this pop(int $count = 1)
     * @method OrderModel|null pull($key, \Closure $default = null)
     * @method OrderModel|null last(callable $callback = null, \Closure $default = null)
     * @method OrderModel|$this random(callable|int|null $number = null)
     * @method OrderModel|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method OrderModel|null get($key, \Closure $default = null)
     * @method OrderModel|null first(callable $callback = null, \Closure $default = null)
     * @method OrderModel|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method OrderModel|null find($key, $default = null)
     * @method OrderModel[] all()
     */
    class _IH_OrderModel_C extends _BaseCollection {
        /**
         * @param int $size
         * @return OrderModel[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_OrderModel_QB whereId($value)
     * @method _IH_OrderModel_QB whereMember($value)
     * @method _IH_OrderModel_QB whereEmail($value)
     * @method _IH_OrderModel_QB wherePhone($value)
     * @method _IH_OrderModel_QB whereAddress($value)
     * @method _IH_OrderModel_QB whereCityId($value)
     * @method _IH_OrderModel_QB whereDistrictId($value)
     * @method _IH_OrderModel_QB whereWardId($value)
     * @method _IH_OrderModel_QB whereNote($value)
     * @method _IH_OrderModel_QB whereStatus($value)
     * @method _IH_OrderModel_QB wherePaymentType($value)
     * @method _IH_OrderModel_QB wherePayment($value)
     * @method _IH_OrderModel_QB whereAdminId($value)
     * @method _IH_OrderModel_QB whereTotalPrice($value)
     * @method _IH_OrderModel_QB whereCouponId($value)
     * @method _IH_OrderModel_QB whereCreatedAt($value)
     * @method _IH_OrderModel_QB whereUpdatedAt($value)
     * @method OrderModel baseSole(array|string $columns = ['*'])
     * @method OrderModel create(array $attributes = [])
     * @method _IH_OrderModel_C|OrderModel[] cursor()
     * @method OrderModel|null|_IH_OrderModel_C|OrderModel[] find($id, array|string $columns = ['*'])
     * @method _IH_OrderModel_C|OrderModel[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method OrderModel|_IH_OrderModel_C|OrderModel[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method OrderModel|_IH_OrderModel_C|OrderModel[] findOrFail($id, array|string $columns = ['*'])
     * @method OrderModel|_IH_OrderModel_C|OrderModel[] findOrNew($id, array|string $columns = ['*'])
     * @method OrderModel first(array|string $columns = ['*'])
     * @method OrderModel firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method OrderModel firstOrCreate(array $attributes = [], array $values = [])
     * @method OrderModel firstOrFail(array|string $columns = ['*'])
     * @method OrderModel firstOrNew(array $attributes = [], array $values = [])
     * @method OrderModel firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method OrderModel forceCreate(array $attributes)
     * @method _IH_OrderModel_C|OrderModel[] fromQuery(string $query, array $bindings = [])
     * @method _IH_OrderModel_C|OrderModel[] get(array|string $columns = ['*'])
     * @method OrderModel getModel()
     * @method OrderModel[] getModels(array|string $columns = ['*'])
     * @method _IH_OrderModel_C|OrderModel[] hydrate(array $items)
     * @method OrderModel make(array $attributes = [])
     * @method OrderModel newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|OrderModel[]|_IH_OrderModel_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|OrderModel[]|_IH_OrderModel_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method OrderModel sole(array|string $columns = ['*'])
     * @method OrderModel updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_OrderModel_QB extends _BaseBuilder {}

    /**
     * @method ProductOrderModel|null getOrPut($key, $value)
     * @method ProductOrderModel|$this shift(int $count = 1)
     * @method ProductOrderModel|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method ProductOrderModel|$this pop(int $count = 1)
     * @method ProductOrderModel|null pull($key, \Closure $default = null)
     * @method ProductOrderModel|null last(callable $callback = null, \Closure $default = null)
     * @method ProductOrderModel|$this random(callable|int|null $number = null)
     * @method ProductOrderModel|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method ProductOrderModel|null get($key, \Closure $default = null)
     * @method ProductOrderModel|null first(callable $callback = null, \Closure $default = null)
     * @method ProductOrderModel|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method ProductOrderModel|null find($key, $default = null)
     * @method ProductOrderModel[] all()
     */
    class _IH_ProductOrderModel_C extends _BaseCollection {
        /**
         * @param int $size
         * @return ProductOrderModel[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_ProductOrderModel_QB whereId($value)
     * @method _IH_ProductOrderModel_QB whereOrderDetailId($value)
     * @method _IH_ProductOrderModel_QB whereProductAttributeId($value)
     * @method _IH_ProductOrderModel_QB whereCreatedAt($value)
     * @method _IH_ProductOrderModel_QB whereUpdatedAt($value)
     * @method ProductOrderModel baseSole(array|string $columns = ['*'])
     * @method ProductOrderModel create(array $attributes = [])
     * @method _IH_ProductOrderModel_C|ProductOrderModel[] cursor()
     * @method ProductOrderModel|null|_IH_ProductOrderModel_C|ProductOrderModel[] find($id, array|string $columns = ['*'])
     * @method _IH_ProductOrderModel_C|ProductOrderModel[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method ProductOrderModel|_IH_ProductOrderModel_C|ProductOrderModel[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProductOrderModel|_IH_ProductOrderModel_C|ProductOrderModel[] findOrFail($id, array|string $columns = ['*'])
     * @method ProductOrderModel|_IH_ProductOrderModel_C|ProductOrderModel[] findOrNew($id, array|string $columns = ['*'])
     * @method ProductOrderModel first(array|string $columns = ['*'])
     * @method ProductOrderModel firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProductOrderModel firstOrCreate(array $attributes = [], array $values = [])
     * @method ProductOrderModel firstOrFail(array|string $columns = ['*'])
     * @method ProductOrderModel firstOrNew(array $attributes = [], array $values = [])
     * @method ProductOrderModel firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method ProductOrderModel forceCreate(array $attributes)
     * @method _IH_ProductOrderModel_C|ProductOrderModel[] fromQuery(string $query, array $bindings = [])
     * @method _IH_ProductOrderModel_C|ProductOrderModel[] get(array|string $columns = ['*'])
     * @method ProductOrderModel getModel()
     * @method ProductOrderModel[] getModels(array|string $columns = ['*'])
     * @method _IH_ProductOrderModel_C|ProductOrderModel[] hydrate(array $items)
     * @method ProductOrderModel make(array $attributes = [])
     * @method ProductOrderModel newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|ProductOrderModel[]|_IH_ProductOrderModel_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|ProductOrderModel[]|_IH_ProductOrderModel_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method ProductOrderModel sole(array|string $columns = ['*'])
     * @method ProductOrderModel updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_ProductOrderModel_QB extends _BaseBuilder {}
}
