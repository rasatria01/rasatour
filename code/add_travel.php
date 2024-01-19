<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Input Data Travel</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Input Data Travel</h2>
        <form action="proses_add_travel.php" method="POST">
            <div class="form-group">
                <label for="id_travel">ID Travel:</label>
                <input type="text" class="form-control" id="id_travel" name="id_travel" required>
            </div>
            <div class="form-group">
                <label for="tujuan">Kota Tujuan Travel:</label>
                <input type="text" class="form-control" id="tujuan" name="tujuan" required>
            </div>
            <div class="form-group">
                <label for="Asal">Kota Asal Travel:</label>
                <input type="text" class="form-control" id="Asal" name="Asal" required>
            </div>
            <div class="form-group">
                <label for="jadwal">Jadwal:</label>
                <input type="text" class="form-control" id="jadwal" name="jadwal" required>
            </div>
            <div class="form-group">
                <label for="jam_brgkt">Jam Berangkat</label>
                <input type="time" class="form-control" id="jam_brgkt" name="jam_brgkt" required>
            </div>
            <div class="form-group">
                <label for="kapasitas">Kapasitas Travel:</label>
                <input type="number" class="form-control" id="kapasitas" name="kapasitas" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" step="1000" class="form-control" id="harga" name="harga" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Kembali ke Index</a> <!-- Tombol "Kembali ke Index" -->
    </div>
</body>
</html>
