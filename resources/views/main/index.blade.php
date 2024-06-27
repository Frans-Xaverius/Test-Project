<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Daftar Mahasiswa</title>
</head>
<body>   
    <div class="relative overflow-x-auto">
        <div class="flex items-center justify-between p-6">
            <h2 class="text-xl">Daftar Mahasiswa</h2>
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('main.create') }}">Tambah Mahasiswa</a>
        </div>
        {{-- Navigation links --}}
        <p>
            <a class="hover:underline" href="{{ route('main.index') }}">Semua Data Saat Ini</a> | 
            <a class="hover:underline" href="{{ route('main.index', ['show' => 'terhapus']) }}">Data Terhapus</a> | 
            <a class="hover:underline" href="{{ route('main.index', ['show' => 'all']) }}">Semua Data</a>
        </p>
        <table class="w-full text-sm text-left border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3 text-xs uppercase border-b border-gray-200">No</th>
                    <th scope="col" class="px-6 py-3 text-xs uppercase border-b border-gray-200">NIM</th>
                    <th scope="col" class="px-6 py-3 text-xs uppercase border-b border-gray-200">Nama</th>
                    <th scope="col" class="px-6 py-3 text-xs uppercase border-b border-gray-200">Fakultas</th>
                    <th scope="col" class="px-6 py-3 text-xs uppercase border-b border-gray-200">Prodi</th>
                    <th scope="col" class="px-6 py-3 text-xs uppercase border-b border-gray-200">Edit</th>
                    <th scope="col" class="px-6 py-3 text-xs uppercase border-b border-gray-200">Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    @if ($mahasiswa->trashed())
                        <tr class="bg-red-100 border-b border-gray-200">
                    @else
                        <tr class="bg-white border-b border-gray-200">
                    @endif
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $mahasiswa->nim }}</td>
                    <td class="px-6 py-4">{{ $mahasiswa->nama }}</td>
                    <td class="px-6 py-4">{{ $mahasiswa->fakultas->nama }}</td>
                    <td class="px-6 py-4">{{ $mahasiswa->prodi->nama }}</td>
                    <td class="px-6 py-4">
                        @if (!$mahasiswa->trashed())
                            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('main.edit', $mahasiswa->id) }}">Edit</a>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if (!$mahasiswa->trashed())
                            <form action="{{ route('main.softdelete', $mahasiswa->id) }}" method="POST" id="deleteForm">
                                @csrf
                                @method('PUT') <!-- Ensure method is PUT for form -->
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
