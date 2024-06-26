<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all(); // Retrieve all Mahasiswa records
        // get the fakultas based on mahasiswa fakultas_id
        $fakultas = $mahasiswas->fakultas_id;

        return view('mahasiswa.index', [
            'mahasiswas' => $mahasiswas,
            'fakultas' => $fakultas
        ]);
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id); // Find the Mahasiswa record by ID
        $mahasiswa->delete(); // Delete the Mahasiswa record

        return redirect()->route('mahasiswa.index'); // Redirect to the Mahasiswa index page
    }
}
