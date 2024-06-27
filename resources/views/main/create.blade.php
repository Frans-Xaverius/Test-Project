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
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white w-full max-w-md p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Mahasiswa</h2>
            <form action="{{ route('main.store') }}" method="POST" id="addMahasiswaForm">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">Nama Mahasiswa:</label>
                    <input type="text" id="nama" name="nama"
                        class="block w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:border-blue-500"
                        placeholder="Masukkan Nama Mahasiswa" required>
                </div>
                <div class="mb-4">
                    <label for="fakultas_kode" class="block text-sm font-semibold text-gray-700 mb-2">Fakultas:</label>
                    <select id="fakultas_kode" name="fakultas_kode"
                        class="block w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:border-blue-500"
                        onchange="getProdiByFakultasKode()" required>
                        <option value="">Pilih Fakultas</option>
                        @foreach ($fakultases as $fakultas)
                        <option value="{{ $fakultas->kode }}" data-fakultas-id="{{ $fakultas->id }}">{{ $fakultas->nama }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" id="fakultas_id" name="fakultas_id">
                </div>
                <div class="mb-4">
                    <label for="prodi_id" class="block text-sm font-semibold text-gray-700 mb-2">Program Studi:</label>
                    <select id="prodi_id" name="prodi_id"
                        class="block w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:border-blue-500"
                        required>
                        <option value="">Pilih Program Studi</option>
                        {{-- Options will be populated dynamically --}}
                    </select>
                </div>
                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Submit</button>
                </div>
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
