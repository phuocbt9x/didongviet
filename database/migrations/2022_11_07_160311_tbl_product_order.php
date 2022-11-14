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
        Schema::create('tbl_product_order', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_detail_id');
            $table->unsignedInteger('product_attribute_id');
            $table->timestamps();
            $table->foreign('order_detail_id')
                ->references('id')
                ->on('tbl_order_detail');
            $table->foreign('product_attribute_id')
                ->references('id')
                ->on('tbl_product_attribute');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_product_order');
    }
};
