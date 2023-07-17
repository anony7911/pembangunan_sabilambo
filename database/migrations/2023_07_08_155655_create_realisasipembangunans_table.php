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
        Schema::create('realisasipembangunans', function (Blueprint $table) {
            $table->id();
            // pembangunan_id
            $table->foreignId('pembangunan_id')->constrained('pembangunans')->onDelete('cascade');
            $table->string('pelaksana');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('persentase')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realisasipembangunans');
    }
};
