<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRoleRelationshipTable extends Migration
{
    use \UuidColumn\Concern\UuidColumn;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permission_relationship', function (Blueprint $table) {
            $this->createUuidColumn($table, 'id');

            $table->string('permission_id');
            $table->string('role_id');

            $table->timestamps();

            /*
             * Index.
             */
            $table->unique(['permission_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_permission_relationship');
    }
}
