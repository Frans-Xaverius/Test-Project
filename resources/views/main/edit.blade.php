<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Edit Mahasiswa</title>
</head>
<body>
    {{-- make it like create.blade.php --}}
    <div class="lex items-center justify-center h-screen">
        <div class="bg-gray-20 p-6 rounded-lg shadow-lg">
            <h2 class="text-xl mb-4">Edit Mahasiswa</h2>
            <form action="{{ route('main.update', $mahasiswa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama Mahasiswa:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}">
                </div>
                <div class="mb-4">
                    <label for="prodi_id" class="block text-gray-700 text-sm font-bold mb-2">Program Studi:</label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="prodi_id" name="prodi_id">
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id }}" {{ $mahasiswa->prodi_id == $prodi->id ? 'selected' : '' }}>{{ $prodi->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="fakultas_id" class="block text-gray-700 text-sm font-bold mb-2">Fakultas:</label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fakultas_id" name="fakultas_id">
                        @foreach($fakultases as $fakultas)
                            <option value="{{ $fakultas->id }}" {{ $mahasiswa->fakultas_id == $fakultas->id ? 'selected' : '' }}>{{ $fakultas->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
            </form>
        </div>
    </div>    
</body>
</html>