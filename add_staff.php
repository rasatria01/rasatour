<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Input Data Staff</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Input Data Staff</h2>
        <form action="proses_add_staff.php" method="POST">
            <div class="form-group">
                <label for="id_staff">Kode Staff:</label>
                <input type="text" class="form-control" id="id_staff" name="id_staff" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama Staff:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin:</label>
                <input type="text" class="form-control" id="jk" name="jk" required>
            </div>
            <div class="form-group">
                <label for="tgl_masuk">Tanggal Masuk:</label>
                <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" required>
            </div>
            <div class="form-group">
                <label for="posisi">Posisi</label>
                <input type="text" class="form-control" id="posisi" name="posisi" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Kembali ke Index</a> <!-- Tombol "Kembali ke Index" -->
    </div>
</body>
</html>
