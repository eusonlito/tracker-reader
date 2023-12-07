<?php declare(strict_types=1);

namespace App\Domains\Permission\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Domains\CoreApp\Model\ModelAbstract;
use App\Domains\Permission\Model\Builder\Permission as Builder;
use App\Domains\Permission\Model\Collection\Permission as Collection;
use App\Domains\User\Model\User as UserModel;
use App\Domains\User\Model\UserPermission as UserPermissionModel;

class Permission extends ModelAbstract
{
    /**
     * @var string
     */
    protected $table = 'permission';

    /**
     * @const string
     */
    public const TABLE = 'permission';

    /**
     * @const string
     */
    public const FOREIGN = 'permission_id';

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'enabled' => 'boolean',
        'admin' => 'boolean',
    ];

    /**
     * @param array $models
     *
     * @return \App\Domains\Permission\Model\Collection\Permission
     */
    public function newCollection(array $models = []): Collection
    {
        return new Collection($models);
    }

    /**
     * @param \Illuminate\Database\Query\Builder $query
     *
     * @return \App\Domains\Permission\Model\Builder\Permission
     */
    public function newEloquentBuilder($query): Builder
    {
        return new Builder($query);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(UserModel::class, UserPermissionModel::TABLE);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return __('permission.'.str_replace('.', '-', $this->code));
    }
}
