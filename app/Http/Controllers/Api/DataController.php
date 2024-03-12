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
        //define validation rules
        $validator = Validator::make($request->all(), [
            "judul" => 'required|string',
            "nama_ketua" => 'required|string',
            "nim_ketua" => 'required|string',
            "jurusan_ketua" => 'required|string',
            "univ_ketua" => 'required|string',
            "alamat_ketua" => 'required|string',
            "hp_ketua" => 'required|string',
            "email_ketua" => 'required|email',
            "jml_anggota" => 'required|string',
            "dosbing" => 'required|string',
            "nidn" => 'required|string',
            "alamat_dosen" => 'required|string',
            "hp_dosen" => 'required|string',
            "dikti" => 'required|string',
            "sumber_lain" => 'required|string',
            "waktu_kerja" => 'required|string',
            "kota" => 'required|string',
            "tanggal" => 'required|date',
            "latbel" => 'required|string',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = Data::create($request->all());

        return new DataResource(true,'Proposal baru telah berhasil dibuat', $data);
    }
}
