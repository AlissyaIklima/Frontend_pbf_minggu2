<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Input Dosen</title>
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
        <h2>Input Data Dosen</h2>
        <div class="input-form">
            <form id="dosenForm">
                <div class="form-group">
                    <label for="idDosen" class="form-label">ID Dosen:</label>
                    <input type="text" class="form-control" id="idDosen" name="idDosen">
                </div>
                <div class="form-group">
                    <label for="namaDosen" class="form-label">Nama Dosen:</label>
                    <input type="text" class="form-control" id="namaDosen" name="namaDosen">
                </div>
                <div class="form-group">
                    <label for="nidnDosen" class="form-label">NIDN:</label>
                    <input type="text" class="form-control" id="nidnDosen" name="nidnDosen">
                </div>
                <div class="form-group">
                    <label for="prodiDosen" class="form-label">Program Studi:</label>
                    <input type="text" class="form-control" id="prodiDosen" name="prodiDosen">
                </div>
                <div class="form-group">
                    <label for="emailDosen" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="emailDosen" name="emailDosen">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Dosen</button>
                <button type="button" class="btn btn-warning mt-2" id="updateDosenBtn" style="display:none;">Update Dosen</button>
                <input type="hidden" id="editIndexDosen">
            </form>
        </div>

        <h2>Data Dosen</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Dosen</th>
                    <th>Nama Dosen</th>
                    <th>NIDN</th>
                    <th>Program Studi</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="dosenTableBody">
            </tbody>
        </table>
    </div>

    <script>
        const dosenForm = document.getElementById('dosenForm');
        const dosenTableBody = document.getElementById('dosenTableBody');
        const updateDosenBtn = document.getElementById('updateDosenBtn');
        const editIndexDosenInput = document.getElementById('editIndexDosen');
        let dosenData = localStorage.getItem('dosenData') ? JSON.parse(localStorage.getItem('dosenData')) : [];
        let editingIndexDosen = -1;

        function renderDosenTable() {
            dosenTableBody.innerHTML = '';
            dosenData.forEach((dosen, index) => {
                const row = dosenTableBody.insertRow();
                row.insertCell().textContent = dosen.idDosen;
                row.insertCell().textContent = dosen.namaDosen;
                row.insertCell().textContent = dosen.nidnDosen;
                row.insertCell().textContent = dosen.prodiDosen;
                row.insertCell().textContent = dosen.emailDosen;

                const actionsCell = row.insertCell();
                const editButton = document.createElement('button');
                editButton.className = 'btn btn-sm btn-primary mr-2';
                editButton.textContent = 'Edit';
                editButton.addEventListener('click', () => editDosen(index));
                actionsCell.appendChild(editButton);

                const deleteButton = document.createElement('button');
                deleteButton.className = 'btn btn-sm btn-danger';
                deleteButton.textContent = 'Hapus';
                deleteButton.addEventListener('click', () => hapusDosen(index));
                actionsCell.appendChild(deleteButton);
            });
            localStorage.setItem('dosenData', JSON.stringify(dosenData));
        }

        function editDosen(index) {
            editingIndexDosen = index;
            const dosen = dosenData[index];
            document.getElementById('idDosen').value = dosen.idDosen;
            document.getElementById('namaDosen').value = dosen.namaDosen;
            document.getElementById('nidnDosen').value = dosen.nidnDosen;
            document.getElementById('prodiDosen').value = dosen.prodiDosen;
            document.getElementById('emailDosen').value = dosen.emailDosen;

            updateDosenBtn.style.display = 'inline-block';
            document.querySelector('button[type="submit"]').style.display = 'none';
            editIndexDosenInput.value = index;
        }

        function hapusDosen(index) {
            if (confirm('Apakah Anda yakin ingin menghapus dosen ini?')) {
                dosenData.splice(index, 1);
                renderDosenTable();
                resetForm();
            }
        }

        dosenForm.addEventListener('submit', function(event) {
            event.preventDefault();
            if (editingIndexDosen === -1) {
                const formData = new FormData(this);
                const newDosen = {};
                formData.forEach((value, key) => {
                    newDosen[key] = value;
                });
                dosenData.push(newDosen);
            } else {
                dosenData[editingIndexDosen] = {
                    idDosen: document.getElementById('idDosen').value,
                    namaDosen: document.getElementById('namaDosen').value,
                    nidnDosen: document.getElementById('nidnDosen').value,
                    prodiDosen: document.getElementById('prodiDosen').value,
                    emailDosen: document.getElementById('emailDosen').value
                };
                editingIndexDosen = -1;
                updateDosenBtn.style.display = 'none';
                document.querySelector('button[type="submit"]').style.display = 'inline-block';
            }
            this.reset();
            renderDosenTable();
        });

        updateDosenBtn.addEventListener('click', function() {
            dosenForm.dispatchEvent(new Event('submit'));
        });

        function resetForm() {
            dosenForm.reset();
            updateDosenBtn.style.display = 'none';
            document.querySelector('button[type="submit"]').style.display = 'inline-block';
            editingIndexDosen = -1;
        }

        renderDosenTable(); // Render saat halaman dimuat
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>