<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta nama="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar</title>
</head>
<body>
    <h1>Tambah Mahasiswa</h1>
    <form method="POST" action="{{ route('form.submit') }}">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama">
        <label for="fakultas">fakultas:</label>
        <select id="fakultas" name="fakultas">
            <option value="Sains-dan-Komputer">Sains dan Komputer</option>
            <option value="Komunikasi-dan-Diplomasi">Fakultas Komunikasi dan Diplomasi </option>
        </select>
        <label for="prodi">Program Studi :</label>
        <select id="prodi" name="prodi">
            <option class="Sains-dan-Komputer" value="Kimia">Kimia</option>
            <option class="Sains-dan-Komputer" value="Ilmu Komputer">Ilmu Komputer</option>
            <option class="Komunikasi-dan-Diplomasi" value="Komunikasi">Komunikasi</option>
            <option class="Komunikasi-dan-Diplomasi" value="Hubungan Internasional">Hubungan Internasional</option>
        </select>

        <button type="submit">Submit</button>
    </form>
</body>
    <script>
        // var fakultas = document.getElementById('fakultas');
        // var prodi = document.getElementById('prodi');

        // fakultas.addEventListener('change', function() {
        //     var selected = this.value;
        //     var prodiOptions = prodi.children;

        //     for (var i = 0; i < prodiOptions.length; i++) {
        //         var prodiOption = prodiOptions[i];
        //         console.log()

        //         if (prodiOption.classList.contains(selected)) {
        //             prodiOption.style.display = 'block';
        //         } else {
        //             prodiOption.style.display = 'none';
        //         }
        //     }
        // });
    </script>
</html>