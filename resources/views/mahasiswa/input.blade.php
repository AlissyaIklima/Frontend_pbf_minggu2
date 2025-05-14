<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Input Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .input-form {
            padding: 20px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container dashboard-container">
        <h2>Input Data Mahasiswa</h2>
        <div class="input-form">
            <form id="mahasiswaForm">
                <div class="form-group">
                    <label for="idMahasiswa" class="form-label">ID Mahasiswa:</label>
                    <input type="text" class="form-control" id="idMahasiswa" name="idMahasiswa">
                </div>
                <div class="form-group">
                    <label for="namaMahasiswa" class="form-label">Nama Mahasiswa:</label>
                    <input type="text" class="form-control" id="namaMahasiswa" name="namaMahasiswa">
                </div>
                <div class="form-group">
                    <label for="nimMahasiswa" class="form-label">NIM:</label>
                    <input type="text" class="form-control" id="nimMahasiswa" name="nimMahasiswa">
                </div>
                <div class="form-group">
                    <label for="prodiMahasiswa" class="form-label">Prodi:</label>
                    <input type="text" class="form-control" id="prodiMahasiswa" name="prodiMahasiswa">
                </div>
                <div class="form-group">
                    <label for="emailMahasiswa" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="emailMahasiswa" name="emailMahasiswa">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Mahasiswa</button>
                <button type="button" class="btn btn-warning mt-2" id="updateMahasiswaBtn" style="display:none;">Update Mahasiswa</button>
                <input type="hidden" id="editIndexMahasiswa">
            </form>
        </div>

        <h2>Data Mahasiswa</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Mahasiswa</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="mahasiswaTableBody">
            </tbody>
        </table>
    </div>

    <script>
        const mahasiswaForm = document.getElementById('mahasiswaForm');
        const mahasiswaTableBody = document.getElementById('mahasiswaTableBody');
        const updateMahasiswaBtn = document.getElementById('updateMahasiswaBtn');
        const editIndexMahasiswaInput = document.getElementById('editIndexMahasiswa');
        let mahasiswaData = localStorage.getItem('mahasiswaData') ? JSON.parse(localStorage.getItem('mahasiswaData')) : [];
        let editingIndexMahasiswa = -1;

        function renderMahasiswaTable() {
            mahasiswaTableBody.innerHTML = '';
            mahasiswaData.forEach((mahasiswa, index) => {
                const row = mahasiswaTableBody.insertRow();
                row.insertCell().textContent = mahasiswa.idMahasiswa;
                row.insertCell().textContent = mahasiswa.namaMahasiswa;
                row.insertCell().textContent = mahasiswa.nimMahasiswa;
                row.insertCell().textContent = mahasiswa.prodiMahasiswa;
                row.insertCell().textContent = mahasiswa.emailMahasiswa;

                const actionsCell = row.insertCell();
                const editButton = document.createElement('button');
                editButton.className = 'btn btn-sm btn-primary mr-2';
                editButton.textContent = 'Edit';
                editButton.addEventListener('click', () => editMahasiswa(index));
                actionsCell.appendChild(editButton);

                const deleteButton = document.createElement('button');
                deleteButton.className = 'btn btn-sm btn-danger';
                deleteButton.textContent = 'Hapus';
                deleteButton.addEventListener('click', () => hapusMahasiswa(index));
                actionsCell.appendChild(deleteButton);
            });
            localStorage.setItem('mahasiswaData', JSON.stringify(mahasiswaData));
        }

        function editMahasiswa(index) {
            editingIndexMahasiswa = index;
            const mahasiswa = mahasiswaData[index];
            document.getElementById('idMahasiswa').value = mahasiswa.idMahasiswa;
            document.getElementById('namaMahasiswa').value = mahasiswa.namaMahasiswa;
            document.getElementById('nimMahasiswa').value = mahasiswa.nimMahasiswa;
            document.getElementById('prodiMahasiswa').value = mahasiswa.prodiMahasiswa;
            document.getElementById('emailMahasiswa').value = mahasiswa.emailMahasiswa;

            updateMahasiswaBtn.style.display = 'inline-block';
            document.querySelector('button[type="submit"]').style.display = 'none';
            editIndexMahasiswaInput.value = index;
        }

        function hapusMahasiswa(index) {
            if (confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?')) {
                mahasiswaData.splice(index, 1);
                renderMahasiswaTable();
                resetForm();
            }
        }

        mahasiswaForm.addEventListener('submit', function(event) {
            event.preventDefault();
            if (editingIndexMahasiswa === -1) {
                const formData = new FormData(this);
                const newMahasiswa = {};
                formData.forEach((value, key) => {
                    newMahasiswa[key] = value;
                });
                mahasiswaData.push(newMahasiswa);
            } else {
                mahasiswaData[editingIndexMahasiswa] = {
                    idMahasiswa: document.getElementById('idMahasiswa').value,
                    namaMahasiswa: document.getElementById('namaMahasiswa').value,
                    nimMahasiswa: document.getElementById('nimMahasiswa').value,
                    prodiMahasiswa: document.getElementById('prodiMahasiswa').value,
                    emailMahasiswa: document.getElementById('emailMahasiswa').value
                };
                editingIndexMahasiswa = -1;
                updateMahasiswaBtn.style.display = 'none';
                document.querySelector('button[type="submit"]').style.display = 'inline-block';
            }
            this.reset();
            renderMahasiswaTable();
        });

        updateMahasiswaBtn.addEventListener('click', function() {
            mahasiswaForm.dispatchEvent(new Event('submit'));
        });

        function resetForm() {
            mahasiswaForm.reset();
            updateMahasiswaBtn.style.display = 'none';
            document.querySelector('button[type="submit"]').style.display = 'inline-block';
            editingIndexMahasiswa = -1;
        }

        renderMahasiswaTable(); // Render saat halaman dimuat
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>