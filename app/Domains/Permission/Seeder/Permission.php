<?php declare(strict_types=1);

namespace App\Domains\Permission\Seeder;

use App\Domains\Permission\Model\Permission as Model;
use App\Domains\Core\Seeder\SeederAbstract;

class Permission extends SeederAbstract
{
    /**
     * @return void
     */
    public function run(): void
    {
        $this->insertWithoutDuplicates(Model::class, $this->json('permission'), 'code');
    }
}
