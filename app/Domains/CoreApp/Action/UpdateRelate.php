<?php declare(strict_types=1);

namespace App\Domains\CoreApp\Action;

use App\Domains\Core\Model\ModelAbstract;

abstract class UpdateRelate extends ActionAbstract
{
    /**
     * @return void
     */
    abstract protected function dataCurrent(): void;

    /**
     * @return void
     */
    abstract protected function dataSelected(): void;

    /**
     * @param array $ids
     *
     * @return void
     */
    abstract protected function saveDeleteIds(array $ids): void;

    /**
     * @param array $ids
     *
     * @return void
     */
    abstract protected function saveInsertIds(array $ids): void;

    /**
     * @return \App\Domains\Core\Model\ModelAbstract
     */
    public function handle(): ModelAbstract
    {
        $this->data();
        $this->save();

        return $this->row;
    }

    /**
     * @return void
     */
    protected function data(): void
    {
        $this->dataCurrent();
        $this->dataSelected();
    }

    /**
     * @return void
     */
    protected function save(): void
    {
        $this->saveDelete();
        $this->saveInsert();
    }

    /**
     * @return void
     */
    protected function saveDelete(): void
    {
        if ($ids = $this->idsDiff($this->data['current'], $this->data['selected'])) {
            $this->saveDeleteIds($ids);
        }
    }

    /**
     * @return void
     */
    protected function saveInsert(): void
    {
        if ($ids = $this->idsDiff($this->data['selected'], $this->data['current'])) {
            $this->saveInsertIds($ids);
        }
    }

    /**
     * @param array $ids1
     * @param array $ids2
     *
     * @return array
     */
    protected function idsDiff(array $ids1, array $ids2): array
    {
        return array_filter(array_unique(array_diff($ids1, $ids2)));
    }
}
