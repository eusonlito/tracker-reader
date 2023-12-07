<?php declare(strict_types=1);

namespace App\Domains\Permission\Action;

use App\Domains\Permission\Model\Permission as Model;
use App\Domains\CoreApp\Action\ActionAbstract as ActionAbstractCore;

abstract class ActionAbstract extends ActionAbstractCore
{
    /**
     * @var ?\App\Domains\Permission\Model\Permission
     */
    protected ?Model $row;
}
