<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <div class="lex items-center justify-center h-screen">
        <div class="bg-gray-20 p-6 rounded-lg shadow-lg">
            <h2 class="text-xl mb-4">Tambah Mahasiswa</h2>
            <form action="{{ route('main.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama Mahasiswa:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" name="nama">
                </div>
                <div class="mb-4">
                    <label for="prodi_id" class="block text-gray-700 text-sm font-bold mb-2">Program Studi:</label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="prodi_id" name="prodi_id">
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id }}">{{ $prodi->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="fakultas_id" class="block text-gray-700 text-sm font-bold mb-2">Fakultas:</label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fakultas_id" name="fakultas_id">
                        @foreach($fakultases as $fakultas)
                            <option value="{{ $fakultas->id }}">{{ $fakultas->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
