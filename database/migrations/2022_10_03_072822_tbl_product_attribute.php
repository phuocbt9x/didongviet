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
        Schema::create('tbl_product_attribute', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('attribute_value_id');
            $table->timestamps();
            $table->foreign('product_id')
                ->references('id')
                ->on('tbl_product')->onDelete('CASCADE');
            $table->foreign('attribute_value_id')
                ->references('id')
                ->on('tbl_attribute_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_product_attribute');
    }
};
