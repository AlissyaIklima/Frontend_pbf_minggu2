<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Data Dosen</title>
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
        <h2>Data Dosen</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Dosen</th>
                    <th>Nama Dosen</th>
                    <th>NIDN</th>
                    <th>Program Studi</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody id="dosenTableBody">
                </tbody>
        </table>

        <div class="btn-container">
             <button type="button" class="btn btn-secondary" onclick="window.location.href='/'">Kembali ke Dashboard</button>
        </div>
    </div>

    <script>
        // Contoh data dosen (idealnya data ini akan diambil dari server)
        const dataDosen = [
            { idDosen: '1234', namaDosen: 'Pak Wahyu', nidn: '23032', prodi: 'Teknik Informatika', email: 'wahyu@gmail.com' },
            { idDosen: '5678', namaDosen: 'Bu Rina', nidn: '45045', prodi: 'Sistem Informasi', email: 'rina@example.com' },
            // Tambahkan data dosen lainnya di sini
        ];

        const dosenTableBody = document.getElementById('dosenTableBody');

        function renderDosenTable() {
            dosenTableBody.innerHTML = '';
            dataDosen.forEach(dosen => {
                const row = dosenTableBody.insertRow();
                row.insertCell().textContent = dosen.idDosen;
                row.insertCell().textContent = dosen.namaDosen;
                row.insertCell().textContent = dosen.nidn;
                row.insertCell().textContent = dosen.prodi;
                row.insertCell().textContent = dosen.email;
            });
        }

        // Render tabel saat halaman dimuat
        renderDosenTable();

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
</body>
</html>