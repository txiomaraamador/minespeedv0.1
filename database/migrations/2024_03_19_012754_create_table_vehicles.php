<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number', 45);
            $table->string('make', 45);
            $table->string('model', 45);
            $table->string('manufacture', 45);
            $table->string('plate', 45);
            $table->string('tonnage', 45);
            $table->unsignedBigInteger('typevehicles_id');
            $table->foreign('typevehicles_id')->references('id')->on('typevehicles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_vehicles');
    }
};
