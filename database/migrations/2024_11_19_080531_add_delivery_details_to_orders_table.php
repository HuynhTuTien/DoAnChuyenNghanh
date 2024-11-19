<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('delivery_address')->nullable()->after('note'); // Địa chỉ giao hàng
            $table->enum('payment_option', ['store', 'delivery'])->default('store')->after('delivery_address'); // Tùy chọn thanh toán
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['delivery_address', 'payment_option']);
        });
    }
};
