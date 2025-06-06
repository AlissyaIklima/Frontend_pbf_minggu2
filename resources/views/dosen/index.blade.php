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
                    <th>Nama Dosen</th>
                    <th>NIDN</th>
                    <th>Email</th>
                    <th>Prodi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="dosenTableBody">
                @foreach($data as $d)
                    <tr>
                        <td>{{ $d['nama'] }}</td>
                        <td>{{ $d['nidn']}}</td>
                        <td>{{ $d['email'] }}</td>
                        <td>{{ $d['prodi'] }}</td>
                        <td>
                            <a href="{{ route('dosen.edit', $d['id']) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('dosen.destroy', $d['id']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="btn-container">
            <button type="button" class="btn btn-secondary" onclick="window.location.href='/'">Kembali ke Dashboard</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
