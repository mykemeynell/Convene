<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesPermissionsTable extends Migration
{
    use \UuidColumn\Concern\UuidColumn;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            $this->createUuidColumn($table, 'id');
            $table->string('permission');
            $table->string('role_id');
            $table->timestamps();
            /*
             * Index.
             */
            $table->unique(['permission', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_permissions');
    }
}
