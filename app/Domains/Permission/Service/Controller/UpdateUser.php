<?php declare(strict_types=1);

namespace App\Domains\Permission\Service\Controller;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use App\Domains\Permission\Model\Permission as Model;
use App\Domains\User\Model\User as UserModel;
use App\Domains\User\Model\Collection\User as UserCollection;
use App\Domains\User\Model\UserPermission as UserPermissionModel;

class UpdateUser extends ControllerAbstract
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Contracts\Auth\Authenticatable $auth
     * @param \App\Domains\Permission\Model\Permission $row
     *
     * @return self
     */
    public function __construct(protected Request $request, protected Authenticatable $auth, protected Model $row)
    {
    }

    /**
     * @return array
     */
    public function data(): array
    {
        return [
            'row' => $this->row,
            'self' => ($this->row->id === $this->auth->id),
            'users' => $this->users(),
        ];
    }

    /**
     * @return \App\Domains\User\Model\Collection\User
     */
    protected function users(): UserCollection
    {
        $current_ids = $this->currentIds();

        return $this->all()->each(static function ($user) use ($current_ids) {
            $user->selected = in_array($user->id, $current_ids);
        })->sortBy([['selected', 'desc'], ['name', 'asc']]);
    }

    /**
     * @return \App\Domains\User\Model\Collection\User
     */
    protected function all(): UserCollection
    {
        return UserModel::query()
            ->list()
            ->get();
    }

    /**
     * @return array
     */
    protected function currentIds(): array
    {
        return UserPermissionModel::query()
            ->byPermissionId($this->row->id)
            ->pluck('user_id')
            ->all();
    }
}
