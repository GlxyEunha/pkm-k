<?php

namespace App\Http\Controllers;

use App\Models\Panduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePanduanRequest;
use App\Http\Requests\UpdatePanduanRequest;

class PanduanController extends Controller
{
    public function upload(){
        $panduan = Panduan::all();
        return view('admin.edit_panduan', compact('panduan'));
        }

        public function proses_upload(Request $request)
        {
            $id = 2; // Specify the desired id
        
            // Find the Panduan record by its ID
            $panduan = Panduan::find($id);
        
            if (!$panduan) {
                // Handle the case where the record with the given ID is not found
                return redirect()->back()->with('error', 'Record not found.');
            }
        
            $this->validate($request, [
                'file' => 'required|file|mimes:pdf|max:10240',
            ]);
        
            // Delete the existing file if it exists
            $existingFile = $panduan->file;
            if ($existingFile) {
                $file_path = public_path('file_panduan/' . $existingFile);
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
        
            // Store the new file with a custom name (e.g., "custom_name.pdf")
            $file = $request->file('file');
            $customFileName = 'panduan_terbaru.pdf';
            $tujuan_upload = 'file_panduan';
            $file->move($tujuan_upload, $customFileName);
        
            // Update the Panduan record with the new file name
            $panduan->update([
                'file' => $customFileName,
            ]);
        
            return redirect()->back()->with('success', 'File name updated successfully.');
        }
        
    // public function proses_upload(Request $request){
    //     $this->validate($request, [
    //     'file' => 'required|file|mimes:pdf|max:10240',
    //     ]);
        
    //     // menyimpan data file yang diupload ke variabel $file
    //     $file = $request->file('file');
        
    //     $nama_file = time()."_".$file->getClientOriginalName();
        
    //                   // isi dengan nama folder tempat kemana file diupload
    //     $tujuan_upload = 'file_panduan';
    //     $file->move($tujuan_upload,$nama_file);
        
    //     Panduan::create([
    //     'file' => $nama_file,
    //     ]);
        
    //     return redirect()->back();
    // }
}
