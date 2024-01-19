<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Input Data Penumpang</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Input Data Penumpang</h2>
        <form action="proses_add_penumpang.php" method="POST">
            <div class="form-group">
                <label for="id_penumpang">Kode Penumpang:</label>
                <input type="text" class="form-control" id="id_penumpang" name="id_penumpang" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama Penumpang:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="tgl_berangkat">Tanggal Keberangkatan:</label>
                <input type="datetime" class="form-control" id="tgl_berangkat" name="tgl_berangkat" required>
            </div>
            <div class="form-group">
                <label for="id_travel">Kode Travel:</label>
                <input type="datetime" class="form-control" id="id_travel" name="id_travel" required>
            </div>
            <div class="form-group">
                <label for="asal">Kota Keberangkatan:</label>
                <input type="text" class="form-control" id="asal" name="asal" required>
            </div>
            <div class="form-group">
                <label for="tujuan">Kota Tujuan:</label>
                <input type="text" class="form-control" id="tujuan" name="tujuan" required>
            </div>
            <div class="form-group">
                <label for="kontak">Kontak</label>
                <input type="text"  class="form-control" id="kontak" name="kontak" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Kembali ke Index</a> <!-- Tombol "Kembali ke Index" -->
    </div>
</body>
</html>
