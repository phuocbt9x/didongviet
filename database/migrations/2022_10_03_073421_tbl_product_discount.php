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
        Schema::create('tbl_product_discount', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('discount_id');
            $table->boolean('activated')->default(0);
            $table->timestamps();
            $table->foreign('product_id')
                ->references('id')
                ->on('tbl_product')->onDelete('CASCADE');
            $table->foreign('discount_id')
                ->references('id')
                ->on('tbl_discount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_product_discount');
    }
};
