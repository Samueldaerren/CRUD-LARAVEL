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
        Schema::create('akuns', function (Blueprint $table) {
            $table->id(); // ID field yang auto-increment
            $table->string('name'); // Field untuk nama
            $table->string('email')->unique(); // Field email yang harus unik
            $table->timestamp('email_verified_at')->nullable(); // Field untuk verifikasi email, nullable
            $table->string('password'); // Field untuk password
            $table->enum('role', ['admin', 'cashier']); // Field untuk role dengan enum
            $table->rememberToken(); // Token untuk fungsi "remember me"
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akuns'); // Menghapus tabel jika ada
    }
};
