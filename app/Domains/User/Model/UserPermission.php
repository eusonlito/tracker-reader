<?php declare(strict_types=1);

namespace App\Domains\User\Model;

use App\Domains\CoreApp\Model\PivotAbstract;
use App\Domains\Permission\Model\Permission as PermissionModel;
use App\Domains\User\Model\Builder\UserPermission as Builder;
use App\Domains\User\Model\Collection\UserPermission as Collection;

class UserPermission extends PivotAbstract
{
    /**
     * @var string
     */
    protected $table = 'user_permission';

    /**
     * @const string
     */
    public const TABLE = 'user_permission';

    /**
     * @const string
     */
    public const FOREIGN = 'user_permission_id';

    /**
     * @param array $models
     *
     * @return \App\Domains\User\Model\Collection\UserPermission
     */
    public function newCollection(array $models = []): Collection
    {
        return new Collection($models);
    }

    /**
     * @param \Illuminate\Database\Query\Builder $query
     *
     * @return \App\Domains\User\Model\Builder\UserPermission
     */
    public function newEloquentBuilder($query): Builder
    {
        return new Builder($query);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permission(): BelongsTo
    {
        return $this->belongsTo(PermissionModel::class, PermissionModel::FOREIGN);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, User::FOREIGN);
    }
}
