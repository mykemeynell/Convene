<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use UuidColumn\Concern\UuidColumn;

class CreateSpacesAccess extends Migration
{
    use UuidColumn;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('space_access', function (Blueprint $table) {
            $this->createUuidColumn($table, 'id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->string('icon');
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
        Schema::dropIfExists('space_access');
    }
}
