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
            // Thêm cột district và ward vào bảng orders
            $table->string('district')->nullable()->after('delivery_address');
            $table->string('ward')->nullable()->after('district');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Xóa cột district và ward nếu cần rollback
            $table->dropColumn(['district', 'ward']);
        });
    }
};
