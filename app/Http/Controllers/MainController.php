<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Fakultas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MainController extends Controller {

    public function index()
    {
        $mahasiswas = $mahasiswas = Mahasiswa::all(); // Fetch all Mahasiswa records
        return view('main.index', compact('mahasiswas')); // Return the view with the Mahasiswa records
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id); // Find the Mahasiswa record by ID
        $mahasiswa->delete(); // Delete the Mahasiswa record

        return redirect()->route('main.index'); // Redirect to the Mahasiswa index page
    }

    // Method to show create form
    public function create()
    {
        $prodis = Prodi::all();
        $fakultases = Fakultas::all();
        return view('main.create', compact('prodis', 'fakultases'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'prodi_id' => 'required|exists:prodis,id',
            'fakultas_id' => 'required|exists:fakultases,id',
        ]);

        // get prodi kode and fakultas kode using their id
        $prodi = Prodi::find($request->prodi_id);
        $fakultas = Fakultas::find($request->fakultas_id);

        // create nim
        $nim = '10' . $fakultas->kode . $prodi->kode . '24';

        // find the last nim
        $lastNim = Mahasiswa::where('nim', 'like', $nim . '%')->orderBy('nim', 'desc')->first();

        // if there is a last nim, increment the last 3 digits
        if ($lastNim) {
            $lastNim = (int) substr($lastNim->nim, -3);
            $lastNim++;
            $nim .= str_pad($lastNim, 3, '0', STR_PAD_LEFT);
        } else {
            $nim .= '001';
        }

        // create a new Mahasiswa record
        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $nim,
            'prodi_id' => $request->prodi_id,
            'fakultas_id' => $request->fakultas_id,
        ]);

        return redirect()->route('main.index')
            ->with('success', 'Mahasiswa added successfully.');
    }

    // Method to show edit form
    public function edit(Mahasiswa $mahasiswa)
    {
        $prodis = Prodi::all();
        $fakultases = Fakultas::all();
        return view('main.edit', compact('mahasiswa', 'prodis', 'fakultases'));
    }

    // Method to update Mahasiswa record
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'prodi_id' => 'required|exists:prodis,id',
            'fakultas_id' => 'required|exists:fakultases,id',
        ]);



        // get prodi kode and fakultas kode using their id
        $prodi = Prodi::find($request->prodi_id);
        $fakultas = Fakultas::find($request->fakultas_id);

        // check if prodi/fakultas change then update nim
        if ($mahasiswa->prodi_id != $request->prodi_id || $mahasiswa->fakultas_id != $request->fakultas_id) {
            // create nim
            $nim = '10' . $fakultas->kode . $prodi->kode . '24';

            // find the last nim
            $lastNim = Mahasiswa::where('nim', 'like', $nim . '%')->orderBy('nim', 'desc')->first();

            // if there is a last nim, increment the last 3 digits
            if ($lastNim) {
                $lastNim = (int) substr($lastNim->nim, -3);
                $lastNim++;
                $nim .= str_pad($lastNim, 3, '0', STR_PAD_LEFT);
            } else {
                $nim .= '001';
            }
        } else {
            $nim = $mahasiswa->nim;
        }

        $mahasiswa->update(
            [
                'nama' => $request->nama,
                'nim' => $nim,
                'prodi_id' => $request->prodi_id,
                'fakultas_id' => $request->fakultas_id,
            ]
        );

        return redirect()->route('main.index')
            ->with('success', 'Mahasiswa updated successfully.');
    }

    public function getProdiByFakultasKode(Request $request)
    {
        $fakultas_kode = $request->input('fakultas_kode');

        // Retrieve the Fakultas based on the kode
        $fakultas = Fakultas::where('kode', $fakultas_kode)->first();

        // Retrieve the Prodi associated with the Fakultas
        if ($fakultas) {
            $prodis = Prodi::where('fakultas_kode', $fakultas_kode)->get();
            return response()->json($prodis);
        } else {
            return response()->json([], 404); // Return empty array if fakultas kode not found
        }
    }
}
