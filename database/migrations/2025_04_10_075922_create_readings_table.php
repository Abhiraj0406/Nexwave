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
        Schema::create('readings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sensor_id');
            $table->string('sitename')->unique();
            $table->decimal('voltage', 8, 4);
            $table->decimal('current', 8, 4);
            $table->decimal('gauge_factor', 8, 4)->default(0);
            $table->timestamps();

            $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('readings');
    }
};
