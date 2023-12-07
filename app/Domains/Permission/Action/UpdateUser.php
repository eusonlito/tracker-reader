<?php declare(strict_types=1);

namespace App\Domains\Permission\Action;

use App\Domains\CoreApp\Action\UpdateRelate as UpdateRelateAction;
use App\Domains\Permission\Model\Permission as Model;
use App\Domains\User\Model\User as UserModel;
use App\Domains\User\Model\UserPermission as UserPermissionModel;

class UpdateUser extends UpdateRelateAction
{
    /**
     * @var \App\Domains\Permission\Model\Permission
     */
    protected Model $row;

    /**
     * @return void
     */
    protected function dataCurrent(): void
    {
        $this->data['current'] = UserPermissionModel::query()
            ->byPermissionId($this->row->id)
            ->pluck('user_id')
            ->all();
    }

    /**
     * @return void
     */
    protected function dataSelected(): void
    {
        $this->data['selected'] = UserModel::query()
            ->byIds($this->data['selected'])
            ->pluck('id')
            ->all();
    }

    /**
     * @param array $ids
     *
     * @return void
     */
    protected function saveDeleteIds(array $ids): void
    {
        UserPermissionModel::query()
            ->byPermissionId($this->row->id)
            ->byUserIds($ids)
            ->delete();
    }

    /**
     * @param array $ids
     *
     * @return void
     */
    protected function saveInsertIds(array $ids): void
    {
        UserPermissionModel::query()->insert(array_map($this->saveInsertMap(...), $ids));
    }

    /**
     * @param int $user_id
     *
     * @return array
     */
    protected function saveInsertMap(int $user_id): array
    {
        return [
            'permission_id' => $this->row->id,
            'user_id' => $user_id,
        ];
    }
}
