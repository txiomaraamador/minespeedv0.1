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
        Schema::create('vehicle_area', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('areas_id');
            $table->unsignedBigInteger('vehicles_id');
            $table->foreign('areas_id')->references('id')->on('areas');
            $table->foreign('vehicles_id')->references('id')->on('vehicles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_vehicle_area');
    }
};
