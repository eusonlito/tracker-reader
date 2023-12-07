<?php declare(strict_types=1);

namespace App\Domains\Permission\Model\Builder;

use App\Domains\CoreApp\Model\Builder\BuilderAbstract;

class Permission extends BuilderAbstract
{
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
     * @return self
     */
    public function list(): self
    {
        return $this->orderBy($this->addTable('code'), 'ASC');
    }

    /**
     * @return self
     */
    public function withUsersCount(): self
    {
        return $this->withCount('users');
    }
}
