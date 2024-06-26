<!-- resources/views/mahasiswa/index.blade.php -->

{{-- @extends('layouts.app') Assuming you have a layout file --}}

{{-- @section('content')/ --}}
    <div class="container">
        <h2>Daftar Mahasiswa</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Fakultas</th>
                    <th>Prodi</th>
                    <th>Hapus</th>
                    
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->fakultas_id->nama }}</td>
                        <td>{{ $mahasiswa->prodi_id }}</td>
                        <td>
                            <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        <!-- Display more columns here -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
{{-- @endsection --}}