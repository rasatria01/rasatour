<?php
// Koneksi ke database
require_once("koneksi.php");

// Inisialisasi variabel
$id_penumpang = "";
$id_travel = "";
$nama = "";
$tujuan = "";
$kota_keberangkatan = "";
$tgl_berangkat = "";
$kontak = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Ambil kode dosen dari parameter URL
    $id_penumpang = $_GET["id"];

    // Query SQL untuk mengambil data dosen berdasarkan kode dosen
    $sql = "SELECT id_penumpang, id_travel, nama, tujuan, kota_keberangkatan, tgl_berangkat, kontak FROM t_penumpang WHERE id_penumpang = '$id_penumpang'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_penumpang = $row["id_penumpang"];
        $id_travel = $row["id_travel"];
        $nama = $row["nama"];
        $tujuan = $row["tujuan"];
        $kota_keberangkatan = $row["kota_keberangkatan"];
        $tgl_berangkat = $row["tgl_berangkat"];
        $kontak = $row["kontak"];
    } else {
        echo "Penumpang tidak ditemukan.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $id_penumpang = $_POST['id_penumpang'];
    $id_travel = $_POST['id_travel'];
    $nama = $_POST['nama'];
    $tujuan = $_POST['tujuan'];
    $kota_keberangkatan = $_POST['kota_keberangkatan'];
    $tgl_berangkat = $_POST['tgl_berangkat'];
    $kontak = $_POST['kontak'];

    // Query SQL untuk melakukan pembaruan data dosen
    $sql = "UPDATE t_penumpang SET nama = '$nama', 
                                    id_travel = '$id_travel',
                                    tujuan = '$tujuan', 
                                    kota_keberangkatan = '$kota_keberangkatan', 
                                    tgl_berangkat = '$tgl_berangkat', 
                                    kontak = '$kontak' 
            WHERE id_penumpang = '$id_penumpang'";

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
    <title>Edit Penumpang</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Penumpang</h2>
        <form action="" method="POST">
            <input type="hidden" name="id_penumpang" value="<?php echo $id_penumpang; ?>">
            <div class="form-group">
                <label for="nama">Nama Penumpang:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
            </div>
            <div class="form-group">
                <label for="tujuan">Tujuan:</label>
                <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?php echo $tujuan; ?>" required>
            </div>
            <div class="form-group">
                <label for="kota_keberangkatan">Kota Keberangkatan:</label>
                <input type="text" class="form-control" id="kota_keberangkatan" name="kota_keberangkatan" value="<?php echo $kota_keberangkatan; ?>" required>
            </div>
            <div class="form-group">
                <label for="id_travel">Kode Travel:</label>
                <input type="text" class="form-control" id="id_travel" name="id_travel" value="<?php echo $id_travel; ?>" required>
            </div>
            <div class="form-group">
                <label for="tgl_berangkat">Tanggal Keberangkatan:</label>
                <input type="datetime" class="form-control" id="tgl_berangkat" name="tgl_berangkat" value="<?php echo $tgl_berangkat; ?>" required>
            </div>
            <div class="form-group">
                <label for="kontak">Kontak:</label>
                <input type="text" class="form-control" id="kontak" name="kontak" value="<?php echo $kontak; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-secondary">Kembali ke Index</a>
        </form>
    </div>
</body>
</html>
