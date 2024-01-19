<?php
// Koneksi ke database
require_once("koneksi.php");

// Inisialisasi variabel
$id_travel = "";
$tujuan = "";
$kota_berangkat = "";
$jadwal = "";
$jam_berangkat = "";
$kapasitas = "";
$harga = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Ambil kode dosen dari parameter URL
    $id_travel = $_GET["id"];

    // Query SQL untuk mengambil data dosen berdasarkan kode dosen
    
    $sql = "SELECT id_travel, tujuan,  kota_berangkat, jadwal, jam_berangkat, kapasitas, harga FROM t_travel WHERE id_travel = '$id_travel'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_travel = $row["id_travel"];
        $tujuan = $row["tujuan"];
        $jadwal = $row["jadwal"];
        $kota_berangkat = $row["kota_berangkat"];
        $jam_berangkat = $row["jam_berangkat"];
        $kapasitas = $row["kapasitas"];
        $harga = $row["harga"];
    } else {
        echo "Travel tidak ditemukan.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $id_travel = $_POST['id_travel'];
    $tujuan = $_POST['tujuan'];
    $jadwal = $_POST['jadwal'];
    $kota_berangkat = $_POST['kota_berangkat'];
    $jam_berangkat = $_POST['jam_berangkat'];
    $kapasitas = $_POST['kapasitas'];
    $harga = $_POST['harga'];

    // Query SQL untuk melakukan pembaruan data dosen
    $sql = "UPDATE t_travel SET kota_berangkat = '$kota_berangkat', 
                                    tujuan = '$tujuan', 
                                    jadwal = '$jadwal', 
                                    jam_berangkat = '$jam_berangkat', 
                                    kapasitas = '$kapasitas', 
                                    harga = '$harga' 
            WHERE id_travel = '$id_travel'";

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
    <title>Edit Travel</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Travel</h2>
        <form action="" method="POST">
            <input type="hidden" name="id_travel" value="<?php echo $id_travel; ?>">
            <div class="form-group">
                <label for="kota_berangkat">Kota Keberangkatan:</label>
                <input type="text" class="form-control" id="kota_berangkat" name="kota_berangkat" value="<?php echo $kota_berangkat; ?>" required>
            </div>
            <div class="form-group">
                <label for="tujuan">Tujuan:</label>
                <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?php echo $tujuan; ?>" required>
            </div>
            <div class="form-group">
                <label for="jadwal">Jadwal:</label>
                <input type="text" class="form-control" id="jadwal" name="jadwal" value="<?php echo $jadwal; ?>" required>
            </div>
            <div class="form-group">
                <label for="jam_berangkat">Jam Keberangkatan:</label>
                <input type="time" class="form-control" id="jam_berangkat" name="jam_berangkat" value="<?php echo $jam_berangkat; ?>" required>
            </div>
            <div class="form-group">
                <label for="kapasitas">Kapasitas:</label>
                <input type="text" class="form-control" id="kapasitas" name="kapasitas" value="<?php echo $kapasitas; ?>" required>
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
