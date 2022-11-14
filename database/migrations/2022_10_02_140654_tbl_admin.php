<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('gender');
            $table->unsignedInteger('role_id');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->timestamp('birth');
            $table->string('avatar');
            $table->string('password');
            $table->string('address')->nullable();
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('district_id');
            $table->unsignedInteger('ward_id');
            $table->boolean('activated');
            $table->timestamps();
            $table->foreign('role_id')
                ->references('id')
                ->on('tbl_role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_admin');
    }
};
