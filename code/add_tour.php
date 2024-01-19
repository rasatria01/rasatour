<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Input Data Tour</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Input Data Tour</h2>
        <form action="proses_add_tour.php" method="POST">
            <div class="form-group">
                <label for="id_tour">Kode Tour:</label>
                <input type="text" class="form-control" id="id_tour" name="id_tour" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama Tour:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="tujuan">Destinasi Tour:</label>
                <input type="text" class="form-control" id="tujuan" name="tujuan" required>
            </div>
            <div class="form-group">
                <label for="durasi">Durasi Tour:</label>
                <input type="number" class="form-control" id="durasi" name="durasi" required>
            </div>
            <div class="form-group">
                <label for="fasilitas">Fasilitas:</label>
                <input type="text" class="form-control" id="fasilitas" name="fasilitas" required>
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
