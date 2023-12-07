<?php declare(strict_types=1);

namespace App\Domains\Permission\Action;

use App\Domains\Permission\Model\Permission as Model;
use App\Domains\CoreApp\Action\UpdateBoolean as UpdateBooleanCoreApp;

class UpdateBoolean extends UpdateBooleanCoreApp
{
    /**
     * @var \App\Domains\Permission\Model\Permission
     */
    protected Model $row;
}
