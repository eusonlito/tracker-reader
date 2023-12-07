<?php declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domains\CoreApp\Migration\MigrationAbstract;
use App\Domains\Permission\Seeder\Permission as PermissionSeeder;

return new class extends MigrationAbstract {
    /**
     * @return void
     */
    public function up(): void
    {
        if ($this->upMigrated()) {
            return;
        }

        $this->tables();
        $this->keys();
        $this->seed();
        $this->fill();
        $this->upFinish();
    }

    /**
     * @return bool
     */
    protected function upMigrated(): bool
    {
        return Schema::hasTable('permission');
    }

    /**
     * @return void
     */
    protected function tables(): void
    {
        Schema::create('permission', function (Blueprint $table) {
            $table->id();

            $table->string('code')->unique();

            $table->boolean('enabled')->default(0);
            $table->boolean('admin')->default(0);

            $this->timestamps($table);
        });

        Schema::create('user_permission', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('user_id');

            $this->timestamps($table);
        });
    }

    /**
     * @return void
     */
    protected function keys(): void
    {
        Schema::table('user_permission', function (Blueprint $table) {
            $this->tableAddUnique($table, ['permission_id', 'user_id']);

            $this->foreignOnDeleteCascade($table, 'permission');
            $this->foreignOnDeleteCascade($table, 'user');
        });
    }

    /**
     * @return void
     */
    protected function seed(): void
    {
        (new PermissionSeeder())->run();
    }

    /**
     * @return void
     */
    protected function fill(): void
    {
        $this->db()->unprepared('
            INSERT INTO `user_permission`
            (`permission_id`, `user_id`)
            (
                SELECT `permission`.`id`, `user`.`id`
                FROM `user`, `permission`
                ORDER BY `permission`.`id`, `user`.`id`
            );
        ');
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::drop('user_permission');
        Schema::drop('permission');
    }
};
