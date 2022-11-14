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
        Schema::create('tbl_banner', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('type')->default(0)->comment('0: banner, 1:slide');
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->string('link')->nullable();
            $table->string('image');
            $table->boolean('activated')->default(0);
            $table->timestamp('time_start');
            $table->timestamp('time_end');
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
        Schema::dropIfExists('tbl_banner');
    }
};
