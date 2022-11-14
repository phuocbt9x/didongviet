<?php //45a639caa315b0286ad0153e899e0587
/** @noinspection all */

namespace LaravelIdea\Helper\App\Models\AdminModel {

    use App\Models\AdminModel\AttributeModel;
    use App\Models\AdminModel\AttributeValueModel;
    use App\Models\AdminModel\BannerModel;
    use App\Models\AdminModel\CategoryModel;
    use App\Models\AdminModel\CouponModel;
    use App\Models\AdminModel\DiscountModel;
    use App\Models\AdminModel\ProductAttributeModel;
    use App\Models\AdminModel\ProductDiscountModel;
    use App\Models\AdminModel\ProductModel;
    use App\Models\AdminModel\RoleModel;
    use App\Models\AdminModel\UserModel;
    use Illuminate\Contracts\Support\Arrayable;
    use Illuminate\Database\Query\Expression;
    use Illuminate\Pagination\LengthAwarePaginator;
    use Illuminate\Pagination\Paginator;
    use LaravelIdea\Helper\_BaseBuilder;
    use LaravelIdea\Helper\_BaseCollection;

    /**
     * @method AttributeModel|null getOrPut($key, $value)
     * @method AttributeModel|$this shift(int $count = 1)
     * @method AttributeModel|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method AttributeModel|$this pop(int $count = 1)
     * @method AttributeModel|null pull($key, \Closure $default = null)
     * @method AttributeModel|null last(callable $callback = null, \Closure $default = null)
     * @method AttributeModel|$this random(callable|int|null $number = null)
     * @method AttributeModel|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method AttributeModel|null get($key, \Closure $default = null)
     * @method AttributeModel|null first(callable $callback = null, \Closure $default = null)
     * @method AttributeModel|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method AttributeModel|null find($key, $default = null)
     * @method AttributeModel[] all()
     */
    class _IH_AttributeModel_C extends _BaseCollection {
        /**
         * @param int $size
         * @return AttributeModel[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_AttributeModel_QB whereId($value)
     * @method _IH_AttributeModel_QB whereName($value)
     * @method _IH_AttributeModel_QB whereActivated($value)
     * @method _IH_AttributeModel_QB whereCreatedAt($value)
     * @method _IH_AttributeModel_QB whereUpdatedAt($value)
     * @method AttributeModel baseSole(array|string $columns = ['*'])
     * @method AttributeModel create(array $attributes = [])
     * @method _IH_AttributeModel_C|AttributeModel[] cursor()
     * @method AttributeModel|null|_IH_AttributeModel_C|AttributeModel[] find($id, array|string $columns = ['*'])
     * @method _IH_AttributeModel_C|AttributeModel[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method AttributeModel|_IH_AttributeModel_C|AttributeModel[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method AttributeModel|_IH_AttributeModel_C|AttributeModel[] findOrFail($id, array|string $columns = ['*'])
     * @method AttributeModel|_IH_AttributeModel_C|AttributeModel[] findOrNew($id, array|string $columns = ['*'])
     * @method AttributeModel first(array|string $columns = ['*'])
     * @method AttributeModel firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method AttributeModel firstOrCreate(array $attributes = [], array $values = [])
     * @method AttributeModel firstOrFail(array|string $columns = ['*'])
     * @method AttributeModel firstOrNew(array $attributes = [], array $values = [])
     * @method AttributeModel firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method AttributeModel forceCreate(array $attributes)
     * @method _IH_AttributeModel_C|AttributeModel[] fromQuery(string $query, array $bindings = [])
     * @method _IH_AttributeModel_C|AttributeModel[] get(array|string $columns = ['*'])
     * @method AttributeModel getModel()
     * @method AttributeModel[] getModels(array|string $columns = ['*'])
     * @method _IH_AttributeModel_C|AttributeModel[] hydrate(array $items)
     * @method AttributeModel make(array $attributes = [])
     * @method AttributeModel newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|AttributeModel[]|_IH_AttributeModel_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|AttributeModel[]|_IH_AttributeModel_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method AttributeModel sole(array|string $columns = ['*'])
     * @method AttributeModel updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_AttributeModel_QB extends _BaseBuilder {}

    /**
     * @method AttributeValueModel|null getOrPut($key, $value)
     * @method AttributeValueModel|$this shift(int $count = 1)
     * @method AttributeValueModel|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method AttributeValueModel|$this pop(int $count = 1)
     * @method AttributeValueModel|null pull($key, \Closure $default = null)
     * @method AttributeValueModel|null last(callable $callback = null, \Closure $default = null)
     * @method AttributeValueModel|$this random(callable|int|null $number = null)
     * @method AttributeValueModel|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method AttributeValueModel|null get($key, \Closure $default = null)
     * @method AttributeValueModel|null first(callable $callback = null, \Closure $default = null)
     * @method AttributeValueModel|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method AttributeValueModel|null find($key, $default = null)
     * @method AttributeValueModel[] all()
     */
    class _IH_AttributeValueModel_C extends _BaseCollection {
        /**
         * @param int $size
         * @return AttributeValueModel[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_AttributeValueModel_QB whereId($value)
     * @method _IH_AttributeValueModel_QB whereAttributeId($value)
     * @method _IH_AttributeValueModel_QB whereValue($value)
     * @method _IH_AttributeValueModel_QB whereActivated($value)
     * @method _IH_AttributeValueModel_QB whereCreatedAt($value)
     * @method _IH_AttributeValueModel_QB whereUpdatedAt($value)
     * @method AttributeValueModel baseSole(array|string $columns = ['*'])
     * @method AttributeValueModel create(array $attributes = [])
     * @method _IH_AttributeValueModel_C|AttributeValueModel[] cursor()
     * @method AttributeValueModel|null|_IH_AttributeValueModel_C|AttributeValueModel[] find($id, array|string $columns = ['*'])
     * @method _IH_AttributeValueModel_C|AttributeValueModel[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method AttributeValueModel|_IH_AttributeValueModel_C|AttributeValueModel[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method AttributeValueModel|_IH_AttributeValueModel_C|AttributeValueModel[] findOrFail($id, array|string $columns = ['*'])
     * @method AttributeValueModel|_IH_AttributeValueModel_C|AttributeValueModel[] findOrNew($id, array|string $columns = ['*'])
     * @method AttributeValueModel first(array|string $columns = ['*'])
     * @method AttributeValueModel firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method AttributeValueModel firstOrCreate(array $attributes = [], array $values = [])
     * @method AttributeValueModel firstOrFail(array|string $columns = ['*'])
     * @method AttributeValueModel firstOrNew(array $attributes = [], array $values = [])
     * @method AttributeValueModel firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method AttributeValueModel forceCreate(array $attributes)
     * @method _IH_AttributeValueModel_C|AttributeValueModel[] fromQuery(string $query, array $bindings = [])
     * @method _IH_AttributeValueModel_C|AttributeValueModel[] get(array|string $columns = ['*'])
     * @method AttributeValueModel getModel()
     * @method AttributeValueModel[] getModels(array|string $columns = ['*'])
     * @method _IH_AttributeValueModel_C|AttributeValueModel[] hydrate(array $items)
     * @method AttributeValueModel make(array $attributes = [])
     * @method AttributeValueModel newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|AttributeValueModel[]|_IH_AttributeValueModel_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|AttributeValueModel[]|_IH_AttributeValueModel_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method AttributeValueModel sole(array|string $columns = ['*'])
     * @method AttributeValueModel updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_AttributeValueModel_QB extends _BaseBuilder {}

    /**
     * @method BannerModel|null getOrPut($key, $value)
     * @method BannerModel|$this shift(int $count = 1)
     * @method BannerModel|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method BannerModel|$this pop(int $count = 1)
     * @method BannerModel|null pull($key, \Closure $default = null)
     * @method BannerModel|null last(callable $callback = null, \Closure $default = null)
     * @method BannerModel|$this random(callable|int|null $number = null)
     * @method BannerModel|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method BannerModel|null get($key, \Closure $default = null)
     * @method BannerModel|null first(callable $callback = null, \Closure $default = null)
     * @method BannerModel|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method BannerModel|null find($key, $default = null)
     * @method BannerModel[] all()
     */
    class _IH_BannerModel_C extends _BaseCollection {
        /**
         * @param int $size
         * @return BannerModel[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_BannerModel_QB whereId($value)
     * @method _IH_BannerModel_QB whereType($value)
     * @method _IH_BannerModel_QB whereTitle($value)
     * @method _IH_BannerModel_QB whereContent($value)
     * @method _IH_BannerModel_QB whereLink($value)
     * @method _IH_BannerModel_QB whereImage($value)
     * @method _IH_BannerModel_QB whereActivated($value)
     * @method _IH_BannerModel_QB whereTimeStart($value)
     * @method _IH_BannerModel_QB whereTimeEnd($value)
     * @method _IH_BannerModel_QB whereCreatedAt($value)
     * @method _IH_BannerModel_QB whereUpdatedAt($value)
     * @method BannerModel baseSole(array|string $columns = ['*'])
     * @method BannerModel create(array $attributes = [])
     * @method _IH_BannerModel_C|BannerModel[] cursor()
     * @method BannerModel|null|_IH_BannerModel_C|BannerModel[] find($id, array|string $columns = ['*'])
     * @method _IH_BannerModel_C|BannerModel[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method BannerModel|_IH_BannerModel_C|BannerModel[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method BannerModel|_IH_BannerModel_C|BannerModel[] findOrFail($id, array|string $columns = ['*'])
     * @method BannerModel|_IH_BannerModel_C|BannerModel[] findOrNew($id, array|string $columns = ['*'])
     * @method BannerModel first(array|string $columns = ['*'])
     * @method BannerModel firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method BannerModel firstOrCreate(array $attributes = [], array $values = [])
     * @method BannerModel firstOrFail(array|string $columns = ['*'])
     * @method BannerModel firstOrNew(array $attributes = [], array $values = [])
     * @method BannerModel firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method BannerModel forceCreate(array $attributes)
     * @method _IH_BannerModel_C|BannerModel[] fromQuery(string $query, array $bindings = [])
     * @method _IH_BannerModel_C|BannerModel[] get(array|string $columns = ['*'])
     * @method BannerModel getModel()
     * @method BannerModel[] getModels(array|string $columns = ['*'])
     * @method _IH_BannerModel_C|BannerModel[] hydrate(array $items)
     * @method BannerModel make(array $attributes = [])
     * @method BannerModel newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|BannerModel[]|_IH_BannerModel_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|BannerModel[]|_IH_BannerModel_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method BannerModel sole(array|string $columns = ['*'])
     * @method BannerModel updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_BannerModel_QB extends _BaseBuilder {}

    /**
     * @method CategoryModel|null getOrPut($key, $value)
     * @method CategoryModel|$this shift(int $count = 1)
     * @method CategoryModel|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method CategoryModel|$this pop(int $count = 1)
     * @method CategoryModel|null pull($key, \Closure $default = null)
     * @method CategoryModel|null last(callable $callback = null, \Closure $default = null)
     * @method CategoryModel|$this random(callable|int|null $number = null)
     * @method CategoryModel|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method CategoryModel|null get($key, \Closure $default = null)
     * @method CategoryModel|null first(callable $callback = null, \Closure $default = null)
     * @method CategoryModel|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method CategoryModel|null find($key, $default = null)
     * @method CategoryModel[] all()
     */
    class _IH_CategoryModel_C extends _BaseCollection {
        /**
         * @param int $size
         * @return CategoryModel[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_CategoryModel_QB whereId($value)
     * @method _IH_CategoryModel_QB whereName($value)
     * @method _IH_CategoryModel_QB whereSlug($value)
     * @method _IH_CategoryModel_QB whereActivated($value)
     * @method _IH_CategoryModel_QB whereCreatedAt($value)
     * @method _IH_CategoryModel_QB whereUpdatedAt($value)
     * @method CategoryModel baseSole(array|string $columns = ['*'])
     * @method CategoryModel create(array $attributes = [])
     * @method _IH_CategoryModel_C|CategoryModel[] cursor()
     * @method CategoryModel|null|_IH_CategoryModel_C|CategoryModel[] find($id, array|string $columns = ['*'])
     * @method _IH_CategoryModel_C|CategoryModel[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method CategoryModel|_IH_CategoryModel_C|CategoryModel[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method CategoryModel|_IH_CategoryModel_C|CategoryModel[] findOrFail($id, array|string $columns = ['*'])
     * @method CategoryModel|_IH_CategoryModel_C|CategoryModel[] findOrNew($id, array|string $columns = ['*'])
     * @method CategoryModel first(array|string $columns = ['*'])
     * @method CategoryModel firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method CategoryModel firstOrCreate(array $attributes = [], array $values = [])
     * @method CategoryModel firstOrFail(array|string $columns = ['*'])
     * @method CategoryModel firstOrNew(array $attributes = [], array $values = [])
     * @method CategoryModel firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method CategoryModel forceCreate(array $attributes)
     * @method _IH_CategoryModel_C|CategoryModel[] fromQuery(string $query, array $bindings = [])
     * @method _IH_CategoryModel_C|CategoryModel[] get(array|string $columns = ['*'])
     * @method CategoryModel getModel()
     * @method CategoryModel[] getModels(array|string $columns = ['*'])
     * @method _IH_CategoryModel_C|CategoryModel[] hydrate(array $items)
     * @method CategoryModel make(array $attributes = [])
     * @method CategoryModel newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|CategoryModel[]|_IH_CategoryModel_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|CategoryModel[]|_IH_CategoryModel_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method CategoryModel sole(array|string $columns = ['*'])
     * @method CategoryModel updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_CategoryModel_QB extends _BaseBuilder {}

    /**
     * @method CouponModel|null getOrPut($key, $value)
     * @method CouponModel|$this shift(int $count = 1)
     * @method CouponModel|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method CouponModel|$this pop(int $count = 1)
     * @method CouponModel|null pull($key, \Closure $default = null)
     * @method CouponModel|null last(callable $callback = null, \Closure $default = null)
     * @method CouponModel|$this random(callable|int|null $number = null)
     * @method CouponModel|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method CouponModel|null get($key, \Closure $default = null)
     * @method CouponModel|null first(callable $callback = null, \Closure $default = null)
     * @method CouponModel|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method CouponModel|null find($key, $default = null)
     * @method CouponModel[] all()
     */
    class _IH_CouponModel_C extends _BaseCollection {
        /**
         * @param int $size
         * @return CouponModel[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_CouponModel_QB whereId($value)
     * @method _IH_CouponModel_QB whereCode($value)
     * @method _IH_CouponModel_QB whereType($value)
     * @method _IH_CouponModel_QB whereValue($value)
     * @method _IH_CouponModel_QB whereStock($value)
     * @method _IH_CouponModel_QB whereActivated($value)
     * @method _IH_CouponModel_QB whereTimeStart($value)
     * @method _IH_CouponModel_QB whereTimeEnd($value)
     * @method _IH_CouponModel_QB whereCreatedAt($value)
     * @method _IH_CouponModel_QB whereUpdatedAt($value)
     * @method CouponModel baseSole(array|string $columns = ['*'])
     * @method CouponModel create(array $attributes = [])
     * @method _IH_CouponModel_C|CouponModel[] cursor()
     * @method CouponModel|null|_IH_CouponModel_C|CouponModel[] find($id, array|string $columns = ['*'])
     * @method _IH_CouponModel_C|CouponModel[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method CouponModel|_IH_CouponModel_C|CouponModel[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method CouponModel|_IH_CouponModel_C|CouponModel[] findOrFail($id, array|string $columns = ['*'])
     * @method CouponModel|_IH_CouponModel_C|CouponModel[] findOrNew($id, array|string $columns = ['*'])
     * @method CouponModel first(array|string $columns = ['*'])
     * @method CouponModel firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method CouponModel firstOrCreate(array $attributes = [], array $values = [])
     * @method CouponModel firstOrFail(array|string $columns = ['*'])
     * @method CouponModel firstOrNew(array $attributes = [], array $values = [])
     * @method CouponModel firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method CouponModel forceCreate(array $attributes)
     * @method _IH_CouponModel_C|CouponModel[] fromQuery(string $query, array $bindings = [])
     * @method _IH_CouponModel_C|CouponModel[] get(array|string $columns = ['*'])
     * @method CouponModel getModel()
     * @method CouponModel[] getModels(array|string $columns = ['*'])
     * @method _IH_CouponModel_C|CouponModel[] hydrate(array $items)
     * @method CouponModel make(array $attributes = [])
     * @method CouponModel newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|CouponModel[]|_IH_CouponModel_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|CouponModel[]|_IH_CouponModel_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method CouponModel sole(array|string $columns = ['*'])
     * @method CouponModel updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_CouponModel_QB extends _BaseBuilder {}

    /**
     * @method DiscountModel|null getOrPut($key, $value)
     * @method DiscountModel|$this shift(int $count = 1)
     * @method DiscountModel|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method DiscountModel|$this pop(int $count = 1)
     * @method DiscountModel|null pull($key, \Closure $default = null)
     * @method DiscountModel|null last(callable $callback = null, \Closure $default = null)
     * @method DiscountModel|$this random(callable|int|null $number = null)
     * @method DiscountModel|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method DiscountModel|null get($key, \Closure $default = null)
     * @method DiscountModel|null first(callable $callback = null, \Closure $default = null)
     * @method DiscountModel|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method DiscountModel|null find($key, $default = null)
     * @method DiscountModel[] all()
     */
    class _IH_DiscountModel_C extends _BaseCollection {
        /**
         * @param int $size
         * @return DiscountModel[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_DiscountModel_QB whereId($value)
     * @method _IH_DiscountModel_QB whereName($value)
     * @method _IH_DiscountModel_QB whereType($value)
     * @method _IH_DiscountModel_QB whereValue($value)
     * @method _IH_DiscountModel_QB whereActivated($value)
     * @method _IH_DiscountModel_QB whereCreatedAt($value)
     * @method _IH_DiscountModel_QB whereUpdatedAt($value)
     * @method DiscountModel baseSole(array|string $columns = ['*'])
     * @method DiscountModel create(array $attributes = [])
     * @method _IH_DiscountModel_C|DiscountModel[] cursor()
     * @method DiscountModel|null|_IH_DiscountModel_C|DiscountModel[] find($id, array|string $columns = ['*'])
     * @method _IH_DiscountModel_C|DiscountModel[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method DiscountModel|_IH_DiscountModel_C|DiscountModel[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method DiscountModel|_IH_DiscountModel_C|DiscountModel[] findOrFail($id, array|string $columns = ['*'])
     * @method DiscountModel|_IH_DiscountModel_C|DiscountModel[] findOrNew($id, array|string $columns = ['*'])
     * @method DiscountModel first(array|string $columns = ['*'])
     * @method DiscountModel firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method DiscountModel firstOrCreate(array $attributes = [], array $values = [])
     * @method DiscountModel firstOrFail(array|string $columns = ['*'])
     * @method DiscountModel firstOrNew(array $attributes = [], array $values = [])
     * @method DiscountModel firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method DiscountModel forceCreate(array $attributes)
     * @method _IH_DiscountModel_C|DiscountModel[] fromQuery(string $query, array $bindings = [])
     * @method _IH_DiscountModel_C|DiscountModel[] get(array|string $columns = ['*'])
     * @method DiscountModel getModel()
     * @method DiscountModel[] getModels(array|string $columns = ['*'])
     * @method _IH_DiscountModel_C|DiscountModel[] hydrate(array $items)
     * @method DiscountModel make(array $attributes = [])
     * @method DiscountModel newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|DiscountModel[]|_IH_DiscountModel_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|DiscountModel[]|_IH_DiscountModel_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method DiscountModel sole(array|string $columns = ['*'])
     * @method DiscountModel updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_DiscountModel_QB extends _BaseBuilder {}

    /**
     * @method ProductAttributeModel|null getOrPut($key, $value)
     * @method ProductAttributeModel|$this shift(int $count = 1)
     * @method ProductAttributeModel|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method ProductAttributeModel|$this pop(int $count = 1)
     * @method ProductAttributeModel|null pull($key, \Closure $default = null)
     * @method ProductAttributeModel|null last(callable $callback = null, \Closure $default = null)
     * @method ProductAttributeModel|$this random(callable|int|null $number = null)
     * @method ProductAttributeModel|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method ProductAttributeModel|null get($key, \Closure $default = null)
     * @method ProductAttributeModel|null first(callable $callback = null, \Closure $default = null)
     * @method ProductAttributeModel|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method ProductAttributeModel|null find($key, $default = null)
     * @method ProductAttributeModel[] all()
     */
    class _IH_ProductAttributeModel_C extends _BaseCollection {
        /**
         * @param int $size
         * @return ProductAttributeModel[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_ProductAttributeModel_QB whereId($value)
     * @method _IH_ProductAttributeModel_QB whereProductId($value)
     * @method _IH_ProductAttributeModel_QB whereAttributeValueId($value)
     * @method _IH_ProductAttributeModel_QB whereCreatedAt($value)
     * @method _IH_ProductAttributeModel_QB whereUpdatedAt($value)
     * @method ProductAttributeModel baseSole(array|string $columns = ['*'])
     * @method ProductAttributeModel create(array $attributes = [])
     * @method _IH_ProductAttributeModel_C|ProductAttributeModel[] cursor()
     * @method ProductAttributeModel|null|_IH_ProductAttributeModel_C|ProductAttributeModel[] find($id, array|string $columns = ['*'])
     * @method _IH_ProductAttributeModel_C|ProductAttributeModel[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method ProductAttributeModel|_IH_ProductAttributeModel_C|ProductAttributeModel[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProductAttributeModel|_IH_ProductAttributeModel_C|ProductAttributeModel[] findOrFail($id, array|string $columns = ['*'])
     * @method ProductAttributeModel|_IH_ProductAttributeModel_C|ProductAttributeModel[] findOrNew($id, array|string $columns = ['*'])
     * @method ProductAttributeModel first(array|string $columns = ['*'])
     * @method ProductAttributeModel firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProductAttributeModel firstOrCreate(array $attributes = [], array $values = [])
     * @method ProductAttributeModel firstOrFail(array|string $columns = ['*'])
     * @method ProductAttributeModel firstOrNew(array $attributes = [], array $values = [])
     * @method ProductAttributeModel firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method ProductAttributeModel forceCreate(array $attributes)
     * @method _IH_ProductAttributeModel_C|ProductAttributeModel[] fromQuery(string $query, array $bindings = [])
     * @method _IH_ProductAttributeModel_C|ProductAttributeModel[] get(array|string $columns = ['*'])
     * @method ProductAttributeModel getModel()
     * @method ProductAttributeModel[] getModels(array|string $columns = ['*'])
     * @method _IH_ProductAttributeModel_C|ProductAttributeModel[] hydrate(array $items)
     * @method ProductAttributeModel make(array $attributes = [])
     * @method ProductAttributeModel newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|ProductAttributeModel[]|_IH_ProductAttributeModel_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|ProductAttributeModel[]|_IH_ProductAttributeModel_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method ProductAttributeModel sole(array|string $columns = ['*'])
     * @method ProductAttributeModel updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_ProductAttributeModel_QB extends _BaseBuilder {}

    /**
     * @method ProductDiscountModel|null getOrPut($key, $value)
     * @method ProductDiscountModel|$this shift(int $count = 1)
     * @method ProductDiscountModel|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method ProductDiscountModel|$this pop(int $count = 1)
     * @method ProductDiscountModel|null pull($key, \Closure $default = null)
     * @method ProductDiscountModel|null last(callable $callback = null, \Closure $default = null)
     * @method ProductDiscountModel|$this random(callable|int|null $number = null)
     * @method ProductDiscountModel|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method ProductDiscountModel|null get($key, \Closure $default = null)
     * @method ProductDiscountModel|null first(callable $callback = null, \Closure $default = null)
     * @method ProductDiscountModel|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method ProductDiscountModel|null find($key, $default = null)
     * @method ProductDiscountModel[] all()
     */
    class _IH_ProductDiscountModel_C extends _BaseCollection {
        /**
         * @param int $size
         * @return ProductDiscountModel[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_ProductDiscountModel_QB whereId($value)
     * @method _IH_ProductDiscountModel_QB whereProductId($value)
     * @method _IH_ProductDiscountModel_QB whereDiscountId($value)
     * @method _IH_ProductDiscountModel_QB whereActivated($value)
     * @method _IH_ProductDiscountModel_QB whereCreatedAt($value)
     * @method _IH_ProductDiscountModel_QB whereUpdatedAt($value)
     * @method ProductDiscountModel baseSole(array|string $columns = ['*'])
     * @method ProductDiscountModel create(array $attributes = [])
     * @method _IH_ProductDiscountModel_C|ProductDiscountModel[] cursor()
     * @method ProductDiscountModel|null|_IH_ProductDiscountModel_C|ProductDiscountModel[] find($id, array|string $columns = ['*'])
     * @method _IH_ProductDiscountModel_C|ProductDiscountModel[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method ProductDiscountModel|_IH_ProductDiscountModel_C|ProductDiscountModel[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProductDiscountModel|_IH_ProductDiscountModel_C|ProductDiscountModel[] findOrFail($id, array|string $columns = ['*'])
     * @method ProductDiscountModel|_IH_ProductDiscountModel_C|ProductDiscountModel[] findOrNew($id, array|string $columns = ['*'])
     * @method ProductDiscountModel first(array|string $columns = ['*'])
     * @method ProductDiscountModel firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProductDiscountModel firstOrCreate(array $attributes = [], array $values = [])
     * @method ProductDiscountModel firstOrFail(array|string $columns = ['*'])
     * @method ProductDiscountModel firstOrNew(array $attributes = [], array $values = [])
     * @method ProductDiscountModel firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method ProductDiscountModel forceCreate(array $attributes)
     * @method _IH_ProductDiscountModel_C|ProductDiscountModel[] fromQuery(string $query, array $bindings = [])
     * @method _IH_ProductDiscountModel_C|ProductDiscountModel[] get(array|string $columns = ['*'])
     * @method ProductDiscountModel getModel()
     * @method ProductDiscountModel[] getModels(array|string $columns = ['*'])
     * @method _IH_ProductDiscountModel_C|ProductDiscountModel[] hydrate(array $items)
     * @method ProductDiscountModel make(array $attributes = [])
     * @method ProductDiscountModel newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|ProductDiscountModel[]|_IH_ProductDiscountModel_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|ProductDiscountModel[]|_IH_ProductDiscountModel_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method ProductDiscountModel sole(array|string $columns = ['*'])
     * @method ProductDiscountModel updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_ProductDiscountModel_QB extends _BaseBuilder {}

    /**
     * @method ProductModel|null getOrPut($key, $value)
     * @method ProductModel|$this shift(int $count = 1)
     * @method ProductModel|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method ProductModel|$this pop(int $count = 1)
     * @method ProductModel|null pull($key, \Closure $default = null)
     * @method ProductModel|null last(callable $callback = null, \Closure $default = null)
     * @method ProductModel|$this random(callable|int|null $number = null)
     * @method ProductModel|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method ProductModel|null get($key, \Closure $default = null)
     * @method ProductModel|null first(callable $callback = null, \Closure $default = null)
     * @method ProductModel|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method ProductModel|null find($key, $default = null)
     * @method ProductModel[] all()
     */
    class _IH_ProductModel_C extends _BaseCollection {
        /**
         * @param int $size
         * @return ProductModel[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_ProductModel_QB whereId($value)
     * @method _IH_ProductModel_QB whereName($value)
     * @method _IH_ProductModel_QB whereCategoryId($value)
     * @method _IH_ProductModel_QB whereSlug($value)
     * @method _IH_ProductModel_QB whereImage($value)
     * @method _IH_ProductModel_QB whereStock($value)
     * @method _IH_ProductModel_QB wherePrice($value)
     * @method _IH_ProductModel_QB whereDescription($value)
     * @method _IH_ProductModel_QB whereActivated($value)
     * @method _IH_ProductModel_QB whereCreatedAt($value)
     * @method _IH_ProductModel_QB whereUpdatedAt($value)
     * @method ProductModel baseSole(array|string $columns = ['*'])
     * @method ProductModel create(array $attributes = [])
     * @method _IH_ProductModel_C|ProductModel[] cursor()
     * @method ProductModel|null|_IH_ProductModel_C|ProductModel[] find($id, array|string $columns = ['*'])
     * @method _IH_ProductModel_C|ProductModel[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method ProductModel|_IH_ProductModel_C|ProductModel[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProductModel|_IH_ProductModel_C|ProductModel[] findOrFail($id, array|string $columns = ['*'])
     * @method ProductModel|_IH_ProductModel_C|ProductModel[] findOrNew($id, array|string $columns = ['*'])
     * @method ProductModel first(array|string $columns = ['*'])
     * @method ProductModel firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProductModel firstOrCreate(array $attributes = [], array $values = [])
     * @method ProductModel firstOrFail(array|string $columns = ['*'])
     * @method ProductModel firstOrNew(array $attributes = [], array $values = [])
     * @method ProductModel firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method ProductModel forceCreate(array $attributes)
     * @method _IH_ProductModel_C|ProductModel[] fromQuery(string $query, array $bindings = [])
     * @method _IH_ProductModel_C|ProductModel[] get(array|string $columns = ['*'])
     * @method ProductModel getModel()
     * @method ProductModel[] getModels(array|string $columns = ['*'])
     * @method _IH_ProductModel_C|ProductModel[] hydrate(array $items)
     * @method ProductModel make(array $attributes = [])
     * @method ProductModel newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|ProductModel[]|_IH_ProductModel_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|ProductModel[]|_IH_ProductModel_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method ProductModel sole(array|string $columns = ['*'])
     * @method ProductModel updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_ProductModel_QB extends _BaseBuilder {}

    /**
     * @method RoleModel|null getOrPut($key, $value)
     * @method RoleModel|$this shift(int $count = 1)
     * @method RoleModel|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method RoleModel|$this pop(int $count = 1)
     * @method RoleModel|null pull($key, \Closure $default = null)
     * @method RoleModel|null last(callable $callback = null, \Closure $default = null)
     * @method RoleModel|$this random(callable|int|null $number = null)
     * @method RoleModel|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method RoleModel|null get($key, \Closure $default = null)
     * @method RoleModel|null first(callable $callback = null, \Closure $default = null)
     * @method RoleModel|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method RoleModel|null find($key, $default = null)
     * @method RoleModel[] all()
     */
    class _IH_RoleModel_C extends _BaseCollection {
        /**
         * @param int $size
         * @return RoleModel[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_RoleModel_QB whereId($value)
     * @method _IH_RoleModel_QB whereName($value)
     * @method _IH_RoleModel_QB whereActivated($value)
     * @method _IH_RoleModel_QB whereCreatedAt($value)
     * @method _IH_RoleModel_QB whereUpdatedAt($value)
     * @method RoleModel baseSole(array|string $columns = ['*'])
     * @method RoleModel create(array $attributes = [])
     * @method _IH_RoleModel_C|RoleModel[] cursor()
     * @method RoleModel|null|_IH_RoleModel_C|RoleModel[] find($id, array|string $columns = ['*'])
     * @method _IH_RoleModel_C|RoleModel[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method RoleModel|_IH_RoleModel_C|RoleModel[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method RoleModel|_IH_RoleModel_C|RoleModel[] findOrFail($id, array|string $columns = ['*'])
     * @method RoleModel|_IH_RoleModel_C|RoleModel[] findOrNew($id, array|string $columns = ['*'])
     * @method RoleModel first(array|string $columns = ['*'])
     * @method RoleModel firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method RoleModel firstOrCreate(array $attributes = [], array $values = [])
     * @method RoleModel firstOrFail(array|string $columns = ['*'])
     * @method RoleModel firstOrNew(array $attributes = [], array $values = [])
     * @method RoleModel firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method RoleModel forceCreate(array $attributes)
     * @method _IH_RoleModel_C|RoleModel[] fromQuery(string $query, array $bindings = [])
     * @method _IH_RoleModel_C|RoleModel[] get(array|string $columns = ['*'])
     * @method RoleModel getModel()
     * @method RoleModel[] getModels(array|string $columns = ['*'])
     * @method _IH_RoleModel_C|RoleModel[] hydrate(array $items)
     * @method RoleModel make(array $attributes = [])
     * @method RoleModel newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|RoleModel[]|_IH_RoleModel_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|RoleModel[]|_IH_RoleModel_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method RoleModel sole(array|string $columns = ['*'])
     * @method RoleModel updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_RoleModel_QB extends _BaseBuilder {}

    /**
     * @method UserModel|null getOrPut($key, $value)
     * @method UserModel|$this shift(int $count = 1)
     * @method UserModel|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method UserModel|$this pop(int $count = 1)
     * @method UserModel|null pull($key, \Closure $default = null)
     * @method UserModel|null last(callable $callback = null, \Closure $default = null)
     * @method UserModel|$this random(callable|int|null $number = null)
     * @method UserModel|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method UserModel|null get($key, \Closure $default = null)
     * @method UserModel|null first(callable $callback = null, \Closure $default = null)
     * @method UserModel|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method UserModel|null find($key, $default = null)
     * @method UserModel[] all()
     */
    class _IH_UserModel_C extends _BaseCollection {
        /**
         * @param int $size
         * @return UserModel[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_UserModel_QB whereId($value)
     * @method _IH_UserModel_QB whereName($value)
     * @method _IH_UserModel_QB whereGender($value)
     * @method _IH_UserModel_QB whereRoleId($value)
     * @method _IH_UserModel_QB whereEmail($value)
     * @method _IH_UserModel_QB wherePhone($value)
     * @method _IH_UserModel_QB whereBirth($value)
     * @method _IH_UserModel_QB whereAvatar($value)
     * @method _IH_UserModel_QB wherePassword($value)
     * @method _IH_UserModel_QB whereAddress($value)
     * @method _IH_UserModel_QB whereCityId($value)
     * @method _IH_UserModel_QB whereDistrictId($value)
     * @method _IH_UserModel_QB whereWardId($value)
     * @method _IH_UserModel_QB whereActivated($value)
     * @method _IH_UserModel_QB whereCreatedAt($value)
     * @method _IH_UserModel_QB whereUpdatedAt($value)
     * @method UserModel baseSole(array|string $columns = ['*'])
     * @method UserModel create(array $attributes = [])
     * @method _IH_UserModel_C|UserModel[] cursor()
     * @method UserModel|null|_IH_UserModel_C|UserModel[] find($id, array|string $columns = ['*'])
     * @method _IH_UserModel_C|UserModel[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method UserModel|_IH_UserModel_C|UserModel[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method UserModel|_IH_UserModel_C|UserModel[] findOrFail($id, array|string $columns = ['*'])
     * @method UserModel|_IH_UserModel_C|UserModel[] findOrNew($id, array|string $columns = ['*'])
     * @method UserModel first(array|string $columns = ['*'])
     * @method UserModel firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method UserModel firstOrCreate(array $attributes = [], array $values = [])
     * @method UserModel firstOrFail(array|string $columns = ['*'])
     * @method UserModel firstOrNew(array $attributes = [], array $values = [])
     * @method UserModel firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method UserModel forceCreate(array $attributes)
     * @method _IH_UserModel_C|UserModel[] fromQuery(string $query, array $bindings = [])
     * @method _IH_UserModel_C|UserModel[] get(array|string $columns = ['*'])
     * @method UserModel getModel()
     * @method UserModel[] getModels(array|string $columns = ['*'])
     * @method _IH_UserModel_C|UserModel[] hydrate(array $items)
     * @method UserModel make(array $attributes = [])
     * @method UserModel newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|UserModel[]|_IH_UserModel_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|UserModel[]|_IH_UserModel_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method UserModel sole(array|string $columns = ['*'])
     * @method UserModel updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_UserModel_QB extends _BaseBuilder {}
}
