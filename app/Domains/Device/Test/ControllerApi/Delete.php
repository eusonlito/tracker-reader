<?php declare(strict_types=1);

namespace App\Domains\Device\Test\ControllerApi;

class Delete extends ControllerApiAbstract
{
    /**
     * @var string
     */
    protected string $route = 'api.device.delete';

    /**
     * @return void
     */
    public function testGetGuestNotAllowedFail(): void
    {
        $this->getGuestNotAllowedFail();
    }

    /**
     * @return void
     */
    public function testPostGuestNotAllowedFail(): void
    {
        $this->postGuestNotAllowedFail();
    }

    /**
     * @return void
     */
    public function testDeleteGuestFail(): void
    {
        $this->deleteGuestFail();
    }

    /**
     * @return void
     */
    public function testDeleteAuthFail(): void
    {
        $this->deleteAuthFail();
    }

    /**
     * @return void
     */
    public function testDeleteAuthSuccess(): void
    {
        $this->deleteAuthSuccess();
    }

    /**
     * @return void
     */
    public function testDeleteAuthAdminFail(): void
    {
        $this->deleteAuthAdminFail();
    }

    /**
     * @return void
     */
    public function testDeleteAuthAdminSuccess(): void
    {
        $this->deleteAuthAdminSuccess();
    }

    /**
     * @return void
     */
    public function testDeleteAuthManagerSuccess(): void
    {
        $this->deleteAuthManagerSuccess();
    }

    /**
     * @return void
     */
    public function testDeleteAuthAdminManagerSuccess(): void
    {
        $this->deleteAuthAdminManagerSuccess();
    }

    /**
     * @return string
     */
    protected function routeToController(): string
    {
        return $this->routeFactoryCreateModel();
    }
}