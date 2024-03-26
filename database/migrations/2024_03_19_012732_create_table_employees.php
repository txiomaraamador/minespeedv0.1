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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('identification_number', 45);
            $table->string('name', 45);
            $table->string('lastname', 45);
            $table->string('email', 45);
            $table->string('license', 45);
            $table->unsignedBigInteger('positions_id');
            $table->foreign('positions_id')->references('id')->on('positions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_employees');
    }
};
