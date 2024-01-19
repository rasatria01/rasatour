<?php
// Koneksi ke database
require_once("koneksi.php");

// Inisialisasi variabel
$id_tour = "";
$nama = "";
$tujuan = "";
$durasi = "";
$fasilitas = "";
$harga = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Ambil kode dosen dari parameter URL
    $id_tour = $_GET["id"];

    // Query SQL untuk mengambil data dosen berdasarkan kode dosen
    $sql = "SELECT id_tour, nama, tujuan, durasi, fasilitas, harga FROM t_tour WHERE id_tour = '$id_tour'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_tour = $row["id_tour"];
        $nama = $row["nama"];
        $tujuan = $row["tujuan"];
        $durasi = $row["durasi"];
        $fasilitas = $row["fasilitas"];
        $harga = $row["harga"];
    } else {
        echo "Penumpang tidak ditemukan.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $id_tour = $_POST['id_tour'];
    $nama = $_POST['nama'];
    $tujuan = $_POST['tujuan'];
    $durasi = $_POST['durasi'];
    $fasilitas = $_POST['fasilitas'];
    $harga = $_POST['harga'];

    // Query SQL untuk melakukan pembaruan data dosen
    $sql = "UPDATE t_tour SET nama = '$nama', 
                                    tujuan = '$tujuan', 
                                    durasi = '$durasi', 
                                    fasilitas = '$fasilitas', 
                                    harga = '$harga' 
            WHERE id_tour = '$id_tour'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect kembali ke halaman index.php setelah berhasil mengedit
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi ke database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Edit Tour</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Tour</h2>
        <form action="" method="POST">
            <input type="hidden" name="id_tour" value="<?php echo $id_tour; ?>">
            <div class="form-group">
                <label for="nama">Nama Tour:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
            </div>
            <div class="form-group">
                <label for="tujuan">Tujuan:</label>
                <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?php echo $tujuan; ?>" required>
            </div>
            <div class="form-group">
                <label for="durasi">Durasi:</label>
                <input type="text" class="form-control" id="durasi" name="durasi" value="<?php echo $durasi; ?>" required>
            </div>
            <div class="form-group">
                <label for="fasilitas">Fasilitas:</label>
                <input type="datetime" class="form-control" id="fasilitas" name="fasilitas" value="<?php echo $fasilitas; ?>" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $harga; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-secondary">Kembali ke Index</a>
        </form>
    </div>
</body>
</html>
