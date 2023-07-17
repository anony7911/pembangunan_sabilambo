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
        Schema::create('pembangunans', function (Blueprint $table) {
            $table->id();
            // jenis_pembangunan_id
            $table->foreignId('jenispembangunan_id')->constrained('jenispembangunans')->onDelete('cascade');
            $table->string('nama_pembangunan');
            $table->string('lokasi');
            $table->string('total_biaya');
            $table->string('sumber_dana');
            $table->string('pelaksana');
            $table->text('deskripsi');
            $table->text('berkas');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembangunans');
    }
};
