<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('schedules', function (Blueprint $table) {
        $table->enum('status', ['pending', 'selesai', 'dibatalkan'])->default('pending');
        $table->string('image')->nullable(); // untuk menyimpan path gambar
    });
}

public function down()
{
    Schema::table('schedules', function (Blueprint $table) {
        $table->dropColumn(['status', 'image']);
    });
}

};
