<?php declare(strict_types=1);

namespace App\Domains\Permission\Validate;

use App\Domains\Core\Validate\ValidateAbstract;

class UpdateUser extends ValidateAbstract
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'selected' => ['bail', 'array'],
            'selected.*' => ['bail', 'integer'],
        ];
    }
}
