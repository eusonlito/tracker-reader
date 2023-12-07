<?php declare(strict_types=1);

namespace App\Domains\Permission\Action;

use App\Domains\Permission\Model\Permission as Model;
use App\Domains\Core\Action\ActionFactoryAbstract;

class ActionFactory extends ActionFactoryAbstract
{
    /**
     * @var ?\App\Domains\Permission\Model\Permission
     */
    protected ?Model $row;

    /**
     * @return \App\Domains\Permission\Model\Permission
     */
    public function update(): Model
    {
        return $this->actionHandle(Update::class, $this->validate()->update());
    }

    /**
     * @return \App\Domains\Permission\Model\Permission
     */
    public function updateBoolean(): Model
    {
        return $this->actionHandle(UpdateBoolean::class, $this->validate()->updateBoolean());
    }

    /**
     * @return \App\Domains\Permission\Model\Permission
     */
    public function updateUser(): Model
    {
        return $this->actionHandle(UpdateUser::class, $this->validate()->updateUser());
    }
}
