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
        Schema::table('users', function (Blueprint $table) {
            $table->date('ngay_sinh')->nullable(); // Ngày sinh
            $table->string('can_cuoc')->nullable(); // Căn cước
            $table->string('que_quan')->nullable(); // Quê quán
            $table->string('chuc_vu')->nullable(); // Chức vụ
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['ngay_sinh', 'can_cuoc', 'que_quan', 'chuc_vu']);
        });
    }
};
