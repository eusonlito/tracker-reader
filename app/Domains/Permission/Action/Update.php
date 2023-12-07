<?php declare(strict_types=1);

namespace App\Domains\Permission\Action;

use App\Domains\Permission\Model\Permission as Model;

class Update extends ActionAbstract
{
    /**
     * @return \App\Domains\Permission\Model\Permission
     */
    public function handle(): Model
    {
        $this->save();

        return $this->row;
    }

    /**
     * @return void
     */
    protected function save(): void
    {
        $this->row->enabled = $this->data['enabled'];
        $this->row->save();
    }
}
