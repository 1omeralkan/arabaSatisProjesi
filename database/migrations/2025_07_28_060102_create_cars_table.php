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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('damage_id');
            $table->unsignedInteger('year');
            $table->string('color');
            $table->unsignedInteger('km');
            $table->boolean('guarantee_status')->default(0)->comment("0-yok , 1-var");
            $table->tinyInteger('vites_türü')->comment("0-manuel, 1-otomatik, 2-yarıOtomatik");
            $table->tinyInteger('yakıt_türü')->comment("0-benzin, 1-dizel, 2-elektrik, 3-LPG");
            $table->dateTime('announcement_date');
            $table->tinyInteger('status')->default(0)->comment("0: Bekliyor, 1: Yayında, 2: Reddedildi");
            $table->integer('fiyat');
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('user_id')
                ->on('users')->references('id')->onDelete('cascade');
            $table->foreign('model_id')
                ->on('car_models')->references('id')->onDelete('cascade');
            $table->foreign('damage_id')
                ->on('car_damages')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
