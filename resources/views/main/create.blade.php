<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" defer></script>
    @vite('resources/css/app.css')
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <div class="lex items-center justify-center h-screen">
        <div class="bg-gray-20 p-6 rounded-lg shadow-lg">
            <h2 class="text-xl mb-4">Tambah Mahasiswa</h2>
            <form action="{{ route('main.store') }}" method="POST" id="addMahasiswaForm">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama Mahasiswa:</label>
                    <input type="text" id="nama" name="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="fakultas_kode" class="block text-gray-700 text-sm font-bold mb-2">Fakultas:</label>
                    <select id="fakultas_kode" name="fakultas_kode" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="getProdiByFakultasKode()">
                        <option value="">Select Fakultas</option>
                        @foreach ($fakultases as $fakultas)
                            <option value="{{ $fakultas->kode }}" data-fakultas-id="{{ $fakultas->id }}">{{ $fakultas->nama }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" id="fakultas_id" name="fakultas_id">
                </div>
                <div class="mb-4">
                    <label for="prodi_id" class="block text-gray-700 text-sm font-bold mb-2">Program Studi:</label>
                    <select id="prodi_id" name="prodi_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Select Program Studi</option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
            </form>
        </div>
    </div>
</body>
<script>
    function getProdiByFakultasKode() {
        var fakultas_kode = document.getElementById('fakultas_kode').value;

        // Set the hidden input value for fakultas_id
        var fakultas_id = document.getElementById('fakultas_id');
        fakultas_id.value = document.querySelector('select[name="fakultas_kode"] option:checked').getAttribute('data-fakultas-id');

        // Make AJAX request
        axios.get('/get-prodi-by-fakultas-kode', {
            params: {
                fakultas_kode: fakultas_kode
            }
        })
        .then(function (response) {
            var prodis = response.data;
            var selectProdi = document.getElementById('prodi_id');

            // Clear existing options
            selectProdi.innerHTML = '';

            // Add new options based on fetched data
            prodis.forEach(function(prodi) {
                var option = document.createElement('option');
                option.value = prodi.id;
                option.text = prodi.nama;
                selectProdi.appendChild(option);
            });
        })
        .catch(function (error) {
            console.error('Error fetching prodi:', error);
        });
    }
</script>
</html>
