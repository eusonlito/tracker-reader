<?php declare(strict_types=1);

namespace App\Domains\Permission\Fractal;

use App\Domains\Permission\Model\Permission as Model;
use App\Domains\Core\Fractal\FractalAbstract;

class FractalFactory extends FractalAbstract
{
    /**
     * @param \App\Domains\Permission\Model\Permission $row
     *
     * @return array
     */
    protected function simple(Model $row): array
    {
        return [
            'code' => $row->code,
            'enabled' => $row->enabled,
            'admin' => $row->admin,
        ];
    }
}
