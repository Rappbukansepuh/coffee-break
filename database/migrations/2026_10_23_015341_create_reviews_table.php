<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama pelanggan
            $table->string('email')->nullable(); // Email (opsional)
            $table->tinyInteger('rating')->default(5); // Nilai rating 1 sampai 5
            $table->text('comment'); // Komentar / ulasan
            $table->boolean('is_approved')->default(true); // Status tampil
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};