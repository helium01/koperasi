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
        Schema::create('rab_tahunans', function (Blueprint $table) {
            $table->id();
            $table->string("tahun");
            $table->string("nomor_perkiraan");
            $table->string("nama_perkiraan");
            $table->string("rab_januari");
            $table->string("rab_februari");
            $table->string("rab_maret");
            $table->string("rab_april");
            $table->string("rab_mei");
            $table->string("rab_juni");
            $table->string("rab_juli");
            $table->string("rab_agustus");
            $table->string("rab_september");
            $table->string("rab_oktober");
            $table->string("rab_november");
            $table->string("rab_desember");
            $table->string("created_by");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rab_tahunans');
    }
};
