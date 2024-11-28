<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDistrictAndWardToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Chỉ thêm district và ward
            $table->string('district')->nullable()->after('delivery_address');
            $table->string('ward')->nullable()->after('district');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Xóa cột district và ward nếu rollback
            $table->dropColumn(['district', 'ward']);
        });
    }
}
