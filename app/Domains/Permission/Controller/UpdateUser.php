<?php declare(strict_types=1);

namespace App\Domains\Permission\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Domains\Permission\Service\Controller\UpdateUser as ControllerService;

class UpdateUser extends ControllerAbstract
{
    /**
     * @param int $id
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function __invoke(int $id): Response|RedirectResponse
    {
        $this->row($id);

        if ($response = $this->actionPost('updateUser')) {
            return $response;
        }

        $this->meta('title', __('permission-update-user.meta-title', ['title' => $this->row->title()]));

        return $this->page('permission.update-user', $this->data());
    }

    /**
     * @return array
     */
    protected function data(): array
    {
        return ControllerService::new($this->request, $this->auth, $this->row)->data();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function updateUser(): RedirectResponse
    {
        $this->action()->updateUser();

        $this->sessionMessage('success', __('permission-update-user.success'));

        return redirect()->route('permission.update.user', $this->row->id);
    }
}
