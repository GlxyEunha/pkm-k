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
        Schema::create("data", function (Blueprint $table) {
            $table->increments("id");
            $table->string("judul");
            $table->string("nama_ketua");
            $table->string("nim_ketua");
            $table->string("jurusan_ketua");
            $table->string("univ_ketua");
            $table->string("alamat_ketua");
            $table->string("hp_ketua");
            $table->string("email_ketua");
            $table->string("jml_anggota");
            $table->string("dosbing");
            $table->string("nidn");
            $table->string("alamat_dosen");
            $table->string("hp_dosen");
            $table->string("dikti");
            $table->string("sumber_lain");
            $table->string("waktu_kerja");
            $table->string("kota");
            $table->date("tanggal");
            $table->longText("latbel");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
