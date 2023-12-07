<?php declare(strict_types=1);

namespace App\Domains\Permission\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class Update extends ControllerAbstract
{
    /**
     * @param int $id
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function __invoke(int $id): Response|RedirectResponse
    {
        $this->row($id);

        if ($response = $this->actionPost('update')) {
            return $response;
        }

        $this->requestMergeWithRow();

        $this->meta('title', __('permission-update.meta-title', ['title' => $this->row->title()]));

        return $this->page('permission.update', [
            'row' => $this->row,
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function update(): RedirectResponse
    {
        $this->action()->update();

        $this->sessionMessage('success', __('permission-update.success'));

        return redirect()->route('permission.update', $this->row->id);
    }
}
