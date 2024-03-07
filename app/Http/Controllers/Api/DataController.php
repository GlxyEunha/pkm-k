<?php

namespace App\Http\Controllers\Api;

//import Model "Post"
use App\Http\Resources\DataResource;
use App\Models\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        
    }
}
