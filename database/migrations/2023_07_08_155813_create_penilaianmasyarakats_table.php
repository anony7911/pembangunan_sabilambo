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
        Schema::create('penilaianmasyarakats', function (Blueprint $table) {
            $table->id();
            // kategori_penilaian_id
            $table->foreignId('kategoripenilaian_id')->constrained('kategoripenilaians')->onDelete('cascade');
            // pembangunan_id
            $table->foreignId('pembangunan_id')->constrained('pembangunans')->onDelete('cascade');
            // masyarakat_id
            $table->foreignId('masyarakat_id')->constrained('masyarakats')->onDelete('cascade');
            $table->enum('nilai', ['1', '2', '3', '4', '5']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaianmasyarakats');
    }
};
