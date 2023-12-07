<?php declare(strict_types=1);

namespace App\Domains\Permission\Controller;

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['user-auth-admin-mode']], static function () {
    Route::get('/permission', Index::class)->name('permission.index');
    Route::any('/permission/{id}', Update::class)->name('permission.update');
    Route::any('/permission/{id}/boolean/{column}', UpdateBoolean::class)->name('permission.update.boolean');
    Route::any('/permission/{id}/user', UpdateUser::class)->name('permission.update.user');
});
