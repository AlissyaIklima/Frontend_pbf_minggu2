<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Data Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 20px;
        }
        .btn-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Mahasiswa</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Mahasiswa</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>Prodi</th>
                </tr>
            </thead>
            <tbody id="mahasiswaTableBody">
                </tbody>
        </table>

        <div class="btn-container">
            <button type="button" class="btn btn-secondary" onclick="window.location.href='/'">Kembali ke Dashboard</button>
        </div>
    </div>

    <script>
        // Contoh data mahasiswa (idealnya data ini akan diambil dari server)
        const dataMahasiswa = [
            { idMahasiswa: '123', namaMahasiswa: 'Alissya', nim: '1111', email: 'alissyaiklim135600@gmail.com', prodi: 'Teknik Informatika' },
            { idMahasiswa: '456', namaMahasiswa: 'Budi Santoso', nim: '2222', email: 'budi.s@example.com', prodi: 'Sistem Informasi' },
            // Tambahkan data mahasiswa lainnya di sini
        ];

        const mahasiswaTableBody = document.getElementById('mahasiswaTableBody');

        function renderMahasiswaTable() {
            mahasiswaTableBody.innerHTML = '';
            dataMahasiswa.forEach(mahasiswa => {
                const row = mahasiswaTableBody.insertRow();
                row.insertCell().textContent = mahasiswa.idMahasiswa;
                row.insertCell().textContent = mahasiswa.namaMahasiswa;
                row.insertCell().textContent = mahasiswa.nim;
                row.insertCell().textContent = mahasiswa.email;
                row.insertCell().textContent = mahasiswa.prodi;
            });
        }

        // Render tabel saat halaman dimuat
        renderMahasiswaTable();

        // Tambahkan logika untuk tombol "Keluar" jika diperlukan (misalnya, membersihkan sesi, redirect ke halaman login, dll.)
        const keluarButton = document.querySelector('.btn-danger');
        keluarButton.addEventListener('click', function() {
            alert('Fungsi Keluar Belum Diimplementasikan'); // Ganti dengan logika sebenarnya
            // window.location.href = 'halaman_login.html'; // Contoh redirect ke halaman login
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>