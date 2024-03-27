<?php

namespace App\Http\Controllers\Api;

//import Model "Post"
use App\Http\Resources\DataResource;
use App\Models\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(){
        //get all data
        $data = Data::latest()->paginate(10);

        //return collection of Data
        return new DataResource(true, "Data berhasil diambil", $data);
        // return response()->json($data);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request){
        // update store function

        // cek apakah
        
        //validation success
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

        $data = Data::create([
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

        // Script PHP yang menerima nama file sebagai parameter dan mengembalikan URL file
        // $baseUrl = '/';
        // $fileName = 'hasilEdit.docx';
        // $fileUrl = $baseUrl . $fileName;
        // return response()->json(['status' => 'success', 'message' => 'File berhasil diunduh', 'file_url' => $fileUrl]);
        
        // return new DataResource(true,'Proposal baru telah berhasil dibuat', $data);
        return response()->file('hasilEdit.docx')->deleteFileAfterSend(true);
        // return response()->download('hasilEdit.docx', 'hasiledit.docx', [], 'inline')->deleteFileAfterSend(true);

    }

    public function show($id)
    {
        //find post by ID
        $data = Data::find($id);

        //return single post as a resource
        return new DataResource(true, 'Detail Data Proposal!', $data);
    }
}
