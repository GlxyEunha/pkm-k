<?php

namespace App\Http\Controllers;

use App\Models\Data;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(Request $request)
    {
        $judul = $request->judul;
        $nama_ketua = $request->nama_ketua;
        $nim_ketua = $request->nim_ketua;
        $jurusan_ketua = $request->jurusan_ketua;
        $univ_ketua = $request->univ_ketua;
        $alamat_ketua = $request->alamat_ketua;
        $hp_ketua = $request->hp_ketua;
        $email_ketua = $request->email_ketua;
        $jml_anggota = $request->jml_anggota;
        $dosbing = $request->dosbing;
        $nidn = $request->nidn;
        $alamat_dosen = $request->alamat_dosen;
        $hp_dosen = $request->hp_dosen;
        $dikti = $request->dikti;
        $sumber_lain = $request->sumber_lain;
        $waktu_kerja = $request->waktu_kerja;
        $kota = $request->kota;
        $tanggal = $request->tanggal;
        $latbel = $request->latbel;

        Data::create([
            'judul' => $judul,
            'nama_ketua' => $nama_ketua,
            'nim_ketua' => $nim_ketua,
            'jurusan_ketua' => $jurusan_ketua,
            'univ_ketua' => $univ_ketua,
            'alamat_ketua' => $alamat_ketua,
            'hp_ketua' => $hp_ketua,
            'email_ketua' => $email_ketua,
            'jml_anggota' => $jml_anggota,
            'dosbing' => $dosbing,
            'nidn' => $nidn,
            'alamat_dosen' => $alamat_dosen,
            'hp_dosen' => $hp_dosen,
            'dikti' => $dikti,
            'sumber_lain' => $sumber_lain,
            'waktu_kerja' => $waktu_kerja,
            'kota' => $kota,
            'tanggal' => $tanggal,
            'latbel' => $latbel
        ]);

        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('myword.docx');
        $phpWord->setValues([
            'judul' => $judul,
            'nama_ketua' => $nama_ketua,
            'nim_ketua' => $nim_ketua,
            'jurusan_ketua' => $jurusan_ketua,
            'univ_ketua' => $univ_ketua,
            'alamat_ketua' => $alamat_ketua,
            'hp_ketua' => $hp_ketua,
            'email_ketua' => $email_ketua,
            'jml_anggota' => $jml_anggota,
            'dosbing' => $dosbing,
            'nidn' => $nidn,
            'alamat_dosen' => $alamat_dosen,
            'hp_dosen' => $hp_dosen,
            'dikti' => $dikti,
            'sumber_lain' => $sumber_lain,
            'waktu_kerja' => $waktu_kerja,
            'kota' => $kota,
            'tanggal' => $tanggal,
            'latbel' => $latbel
        ]);
        $phpWord->saveAs('hasilEdit.docx');

        return response()->download('hasilEdit.docx')->deleteFileAfterSend(true);
    }
}
