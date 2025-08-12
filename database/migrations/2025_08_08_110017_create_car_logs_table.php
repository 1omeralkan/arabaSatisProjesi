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
        Schema::create('car_logs', function (Blueprint $table) {
            $table->id();

            // Hangi ilana ait?
            $table->unsignedBigInteger('car_id');

            // Bu işlemi kim yaptı?
            $table->unsignedBigInteger('user_id');

            // Yapılan işlem türü (güncelleme, silme)
            $table->string('action'); // örnek: "güncelleme", "silme"

            $table->timestamps();

            // Foreign Key ilişkileri
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_logs');
    }
};
