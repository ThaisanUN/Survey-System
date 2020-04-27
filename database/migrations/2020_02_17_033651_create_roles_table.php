<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function(Blueprint $table) {
            // $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('permission_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });
        Schema::table('roles', function(Blueprint $table) {
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function(Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['permission_id']);
        });
        Schema::dropIfExists('roles');
    }
}
