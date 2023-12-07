<?php declare(strict_types=1);

namespace App\Domains\User\Model\Builder;

use App\Domains\CoreApp\Model\Builder\BuilderAbstract;

class UserPermission extends BuilderAbstract
{
    /**
     * @param int $permission_id
     *
     * @return self
     */
    public function byPermissionId(int $permission_id): self
    {
        return $this->where($this->addTable('permission_id'), $permission_id);
    }

    /**
     * @param array $permission_ids
     *
     * @return self
     */
    public function byPermissionIds(array $permission_ids): self
    {
        return $this->whereIntegerInRaw($this->addTable('permission_id'), $permission_ids);
    }

    /**
     * @param int $user_id
     *
     * @return self
     */
    public function byUserId(int $user_id): self
    {
        return $this->where($this->addTable('user_id'), $user_id);
    }

    /**
     * @param array $user_ids
     *
     * @return self
     */
    public function byUserIds(array $user_ids): self
    {
        return $this->whereIntegerInRaw($this->addTable('user_id'), $user_ids);
    }
}
