<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'nama_ketua', 'nim_ketua', 'jurusan_ketua', 'univ_ketua', 'alamat_ketua', 'hp_ketua', 'email_ketua', 'jml_anggota', 'dosbing', 'nidn', 'alamat_dosen', 'hp_dosen', 'dikti', 'sumber_lain', 'waktu_kerja', 'kota', 'tanggal', 'latbel'];
    public $timestamps = false;
}
