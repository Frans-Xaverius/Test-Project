<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index() {
        return view('daftar');
    }

    public function submit(Request $request)
    {
        $fakultas = $request->fakultas;
        $prodi = $request->prodi;
        // $nim = "10";
        
        if($fakultas == "Sains-dan-Komputer") {
            $fakultas_id = 1;
            if($prodi == "Kimia") {
                $nim = "105124";
                $prodi_id = 1;
            } else if($prodi == "Ilmu Komputer") {
                $nim = "105224";
                $prodi_id = 2;
            }
        } else if($fakultas == "Komunikasi-dan-Diplomasi") {
            $fakultas_id = 2;
            if($prodi == "Komunikasi") {
                $nim = "106124";
                $prodi_id = 3;
            } else if($prodi == "Hubungan Internasional") {
                $nim = "106224";
                $prodi_id = 4;
            }
        }

        $mahasiswa = Mahasiswa::where('nim', $nim)->get();

        return dd($mahasiswa, $nim);

        // $post->nama= $request->nama;
        // $post->fakultas = $request->fakultas;
        // $post->prodi = $request->prodi;
        // $post->save();
        // return redirect('daftar')->with('status', 'Blog Post Form Data Has Been inserted');
    }
}
