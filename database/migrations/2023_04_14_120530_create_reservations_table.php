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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->string('name');
            $table->string('class');
            $table->integer('persons');
            $table->integer('price');
            $table->date('arrival_date');
            $table->date('departure_day');
            $table->string('person_name');
            $table->string('person_email');
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
