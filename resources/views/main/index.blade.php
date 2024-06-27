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
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">NIM</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Fakultas</th>
                    <th scope="col" class="px-6 py-3">Prodi</th>
                    <th scope="col" class="px-6 py-3">Edit</th>
                    <th scope="col" class="px-6 py-3">Hapus</th>
                    
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <trclass="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $mahasiswa->nim }}</td>
                        <td class="px-6 py-4">{{ $mahasiswa->nama }}</td>
                        <td class="px-6 py-4">{{ $mahasiswa->fakultas->nama }}</td>
                        <td class="px-6 py-4">{{ $mahasiswa->prodi->nama }}</td>
                        <td class="px-6 py-4">
                            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('main.edit', $mahasiswa->id) }}">Edit</a>
                        <td class="px-6 py-4">
                            <form action="{{ route('main.destroy', $mahasiswa->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                {{-- add tailwind styling for delete button --}}
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                            </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
