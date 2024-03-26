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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('message', 150);
            $table->string('speed', 45);
            $table->string('photo', 150)->nullable();
            $table->unsignedBigInteger('employee_vehicle_id');
            $table->unsignedBigInteger('equipments_id');
            $table->foreign('employee_vehicle_id')->references('id')->on('employee_vehicle');
            $table->foreign('equipments_id')->references('id')->on('equipments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_histories');
    }
};
