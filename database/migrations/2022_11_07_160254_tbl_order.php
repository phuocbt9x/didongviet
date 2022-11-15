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
        Schema::create('tbl_order', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_id')->nullable();
            $table->string('member');
            $table->string('email');
            $table->string('phone');
            $table->string('address')->nullable();
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('district_id');
            $table->unsignedInteger('ward_id');
            $table->text('note')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('payment_type')->default(0)->comment('0: Giao hàng nhận tiền, 1: Thanh toán online');
            $table->string('payment')->nullable();
            $table->unsignedInteger('admin_id')->nullable();
            $table->unsignedInteger('total_price');
            $table->unsignedInteger('coupon_id')->nullable();
            $table->timestamps();
            $table->foreign('member_id')
                ->references('id')
                ->on('tbl_member');
            $table->foreign('admin_id')
                ->references('id')
                ->on('tbl_admin');
            $table->foreign('coupon_id')
                ->references('id')
                ->on('tbl_coupon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_order');
    }
};
