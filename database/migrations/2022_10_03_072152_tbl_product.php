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
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->unsignedInteger('category_id');
            $table->string('slug');
            $table->string('image');
            $table->unsignedInteger('stock');
            $table->unsignedInteger('price');
            $table->longText('description');
            $table->boolean('activated')->default(0);
            $table->timestamps();
            $table->foreign('category_id')
                ->references('id')
                ->on('tbl_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_product');
    }
};
