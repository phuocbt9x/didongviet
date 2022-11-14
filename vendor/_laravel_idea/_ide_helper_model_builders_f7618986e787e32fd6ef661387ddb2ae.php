<?php //e889e7a8391a057f784a80a924b25acd
/** @noinspection all */

namespace LaravelIdea\Helper\App\Models\CustomerModel {

    use App\Models\CustomerModel\MemberModel;
    use App\Models\CustomerModel\ReviewModel;
    use App\Models\CustomerModel\ShopModel;
    use Illuminate\Contracts\Support\Arrayable;
    use Illuminate\Database\Query\Expression;
    use Illuminate\Pagination\LengthAwarePaginator;
    use Illuminate\Pagination\Paginator;
    use LaravelIdea\Helper\_BaseBuilder;
    use LaravelIdea\Helper\_BaseCollection;

    /**
     * @method MemberModel|null getOrPut($key, $value)
     * @method MemberModel|$this shift(int $count = 1)
     * @method MemberModel|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method MemberModel|$this pop(int $count = 1)
     * @method MemberModel|null pull($key, \Closure $default = null)
     * @method MemberModel|null last(callable $callback = null, \Closure $default = null)
     * @method MemberModel|$this random(callable|int|null $number = null)
     * @method MemberModel|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method MemberModel|null get($key, \Closure $default = null)
     * @method MemberModel|null first(callable $callback = null, \Closure $default = null)
     * @method MemberModel|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method MemberModel|null find($key, $default = null)
     * @method MemberModel[] all()
     */
    class _IH_MemberModel_C extends _BaseCollection {
        /**
         * @param int $size
         * @return MemberModel[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_MemberModel_QB whereId($value)
     * @method _IH_MemberModel_QB whereType($value)
     * @method _IH_MemberModel_QB whereName($value)
     * @method _IH_MemberModel_QB whereEmail($value)
     * @method _IH_MemberModel_QB wherePhone($value)
     * @method _IH_MemberModel_QB whereBirth($value)
     * @method _IH_MemberModel_QB whereAvatar($value)
     * @method _IH_MemberModel_QB wherePassword($value)
     * @method _IH_MemberModel_QB whereAddress($value)
     * @method _IH_MemberModel_QB whereCityId($value)
     * @method _IH_MemberModel_QB whereDistrictId($value)
     * @method _IH_MemberModel_QB whereWardId($value)
     * @method _IH_MemberModel_QB whereActivated($value)
     * @method _IH_MemberModel_QB whereActivationToken($value)
     * @method _IH_MemberModel_QB whereRememberToken($value)
     * @method _IH_MemberModel_QB whereCreatedAt($value)
     * @method _IH_MemberModel_QB whereUpdatedAt($value)
     * @method MemberModel baseSole(array|string $columns = ['*'])
     * @method MemberModel create(array $attributes = [])
     * @method _IH_MemberModel_C|MemberModel[] cursor()
     * @method MemberModel|null|_IH_MemberModel_C|MemberModel[] find($id, array|string $columns = ['*'])
     * @method _IH_MemberModel_C|MemberModel[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method MemberModel|_IH_MemberModel_C|MemberModel[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method MemberModel|_IH_MemberModel_C|MemberModel[] findOrFail($id, array|string $columns = ['*'])
     * @method MemberModel|_IH_MemberModel_C|MemberModel[] findOrNew($id, array|string $columns = ['*'])
     * @method MemberModel first(array|string $columns = ['*'])
     * @method MemberModel firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method MemberModel firstOrCreate(array $attributes = [], array $values = [])
     * @method MemberModel firstOrFail(array|string $columns = ['*'])
     * @method MemberModel firstOrNew(array $attributes = [], array $values = [])
     * @method MemberModel firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method MemberModel forceCreate(array $attributes)
     * @method _IH_MemberModel_C|MemberModel[] fromQuery(string $query, array $bindings = [])
     * @method _IH_MemberModel_C|MemberModel[] get(array|string $columns = ['*'])
     * @method MemberModel getModel()
     * @method MemberModel[] getModels(array|string $columns = ['*'])
     * @method _IH_MemberModel_C|MemberModel[] hydrate(array $items)
     * @method MemberModel make(array $attributes = [])
     * @method MemberModel newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|MemberModel[]|_IH_MemberModel_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|MemberModel[]|_IH_MemberModel_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method MemberModel sole(array|string $columns = ['*'])
     * @method MemberModel updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_MemberModel_QB extends _BaseBuilder {}

    /**
     * @method ReviewModel|null getOrPut($key, $value)
     * @method ReviewModel|$this shift(int $count = 1)
     * @method ReviewModel|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method ReviewModel|$this pop(int $count = 1)
     * @method ReviewModel|null pull($key, \Closure $default = null)
     * @method ReviewModel|null last(callable $callback = null, \Closure $default = null)
     * @method ReviewModel|$this random(callable|int|null $number = null)
     * @method ReviewModel|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method ReviewModel|null get($key, \Closure $default = null)
     * @method ReviewModel|null first(callable $callback = null, \Closure $default = null)
     * @method ReviewModel|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method ReviewModel|null find($key, $default = null)
     * @method ReviewModel[] all()
     */
    class _IH_ReviewModel_C extends _BaseCollection {
        /**
         * @param int $size
         * @return ReviewModel[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_ReviewModel_QB whereId($value)
     * @method _IH_ReviewModel_QB whereName($value)
     * @method _IH_ReviewModel_QB whereEmail($value)
     * @method _IH_ReviewModel_QB whereStar($value)
     * @method _IH_ReviewModel_QB whereComment($value)
     * @method _IH_ReviewModel_QB whereProductId($value)
     * @method _IH_ReviewModel_QB whereActivated($value)
     * @method _IH_ReviewModel_QB whereCreatedAt($value)
     * @method _IH_ReviewModel_QB whereUpdatedAt($value)
     * @method ReviewModel baseSole(array|string $columns = ['*'])
     * @method ReviewModel create(array $attributes = [])
     * @method _IH_ReviewModel_C|ReviewModel[] cursor()
     * @method ReviewModel|null|_IH_ReviewModel_C|ReviewModel[] find($id, array|string $columns = ['*'])
     * @method _IH_ReviewModel_C|ReviewModel[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method ReviewModel|_IH_ReviewModel_C|ReviewModel[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ReviewModel|_IH_ReviewModel_C|ReviewModel[] findOrFail($id, array|string $columns = ['*'])
     * @method ReviewModel|_IH_ReviewModel_C|ReviewModel[] findOrNew($id, array|string $columns = ['*'])
     * @method ReviewModel first(array|string $columns = ['*'])
     * @method ReviewModel firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ReviewModel firstOrCreate(array $attributes = [], array $values = [])
     * @method ReviewModel firstOrFail(array|string $columns = ['*'])
     * @method ReviewModel firstOrNew(array $attributes = [], array $values = [])
     * @method ReviewModel firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method ReviewModel forceCreate(array $attributes)
     * @method _IH_ReviewModel_C|ReviewModel[] fromQuery(string $query, array $bindings = [])
     * @method _IH_ReviewModel_C|ReviewModel[] get(array|string $columns = ['*'])
     * @method ReviewModel getModel()
     * @method ReviewModel[] getModels(array|string $columns = ['*'])
     * @method _IH_ReviewModel_C|ReviewModel[] hydrate(array $items)
     * @method ReviewModel make(array $attributes = [])
     * @method ReviewModel newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|ReviewModel[]|_IH_ReviewModel_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|ReviewModel[]|_IH_ReviewModel_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method ReviewModel sole(array|string $columns = ['*'])
     * @method ReviewModel updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_ReviewModel_QB extends _BaseBuilder {}

    /**
     * @method ShopModel|null getOrPut($key, $value)
     * @method ShopModel|$this shift(int $count = 1)
     * @method ShopModel|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method ShopModel|$this pop(int $count = 1)
     * @method ShopModel|null pull($key, \Closure $default = null)
     * @method ShopModel|null last(callable $callback = null, \Closure $default = null)
     * @method ShopModel|$this random(callable|int|null $number = null)
     * @method ShopModel|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method ShopModel|null get($key, \Closure $default = null)
     * @method ShopModel|null first(callable $callback = null, \Closure $default = null)
     * @method ShopModel|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method ShopModel|null find($key, $default = null)
     * @method ShopModel[] all()
     */
    class _IH_ShopModel_C extends _BaseCollection {
        /**
         * @param int $size
         * @return ShopModel[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method ShopModel baseSole(array|string $columns = ['*'])
     * @method ShopModel create(array $attributes = [])
     * @method _IH_ShopModel_C|ShopModel[] cursor()
     * @method ShopModel|null|_IH_ShopModel_C|ShopModel[] find($id, array|string $columns = ['*'])
     * @method _IH_ShopModel_C|ShopModel[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method ShopModel|_IH_ShopModel_C|ShopModel[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ShopModel|_IH_ShopModel_C|ShopModel[] findOrFail($id, array|string $columns = ['*'])
     * @method ShopModel|_IH_ShopModel_C|ShopModel[] findOrNew($id, array|string $columns = ['*'])
     * @method ShopModel first(array|string $columns = ['*'])
     * @method ShopModel firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ShopModel firstOrCreate(array $attributes = [], array $values = [])
     * @method ShopModel firstOrFail(array|string $columns = ['*'])
     * @method ShopModel firstOrNew(array $attributes = [], array $values = [])
     * @method ShopModel firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method ShopModel forceCreate(array $attributes)
     * @method _IH_ShopModel_C|ShopModel[] fromQuery(string $query, array $bindings = [])
     * @method _IH_ShopModel_C|ShopModel[] get(array|string $columns = ['*'])
     * @method ShopModel getModel()
     * @method ShopModel[] getModels(array|string $columns = ['*'])
     * @method _IH_ShopModel_C|ShopModel[] hydrate(array $items)
     * @method ShopModel make(array $attributes = [])
     * @method ShopModel newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|ShopModel[]|_IH_ShopModel_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|ShopModel[]|_IH_ShopModel_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method ShopModel sole(array|string $columns = ['*'])
     * @method ShopModel updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_ShopModel_QB extends _BaseBuilder {}
}
