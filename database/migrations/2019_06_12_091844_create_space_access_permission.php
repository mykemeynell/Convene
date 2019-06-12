<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use UuidColumn\Concern\UuidColumn;

class CreateSpaceAccessPermission extends Migration
{
    use UuidColumn;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('space_access_permissions', function (Blueprint $table) {
            $this->createUuidColumn($table, 'id');
            $table->string('space_id');
            $table->string('object_id');
            $table->string('object_type')->default('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('space_access_permissions');
    }
}
