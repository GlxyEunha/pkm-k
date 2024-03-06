<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function index(Request $request) {
        $nama = $request->nama;
        $alamat = $request->alamat;
        $jabatan = $request->jabatan;
        $nim = $request->nim;
        $produk = $request->produk;
        $nama2 = $request->nama2;
        $alamat2 = $request->alamat2;
        $jabatan2 = $request->jabatan2;


        // Save data to the database
        Data::create([
            'nama' => $nama,
            'alamat' => $alamat,
            'jabatan' => $jabatan,
            'nim' => $nim,
            'produk' => $produk,
            'nama2' => $nama2,
            'alamat2' => $alamat2,
            'jabatan2' => $jabatan2,
        ]);

        // Generating Word document
        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('myword.docx');
        $phpWord->setValues([
            'nama' => $nama,
            'alamat' => $alamat,
            'jabatan' => $jabatan,
            'nim' => $nim,
            'produk' => $produk,
            'nama2' => $nama2,
            'alamat2' => $alamat2,
            'jabatan2' => $jabatan2,
        ]);
        $phpWord->saveAs('hasilEdit.docx');

        return response()->download('hasilEdit.docx')->deleteFileAfterSend(true);
    }
}
