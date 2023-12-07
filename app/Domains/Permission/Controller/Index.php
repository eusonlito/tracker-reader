<?php declare(strict_types=1);

namespace App\Domains\Permission\Controller;

use Illuminate\Http\Response;
use App\Domains\Permission\Model\Permission as Model;

class Index extends ControllerAbstract
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function __invoke(): Response
    {
        $this->meta('title', __('permission-index.meta-title'));

        return $this->page('permission.index', [
            'list' => Model::query()->list()->withUsersCount()->get(),
        ]);
    }
}
