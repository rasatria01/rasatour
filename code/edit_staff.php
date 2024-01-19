<?php
// Koneksi ke database
require_once("koneksi.php");

// Inisialisasi variabel
$id_pegawai = "";
$nama = "";
$tgl_lahir = "";
$jk = "";
$tgl_masuk = "";
$posisi = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Ambil kode dosen dari parameter URL
    $id_pegawai = $_GET["id"];

    // Query SQL untuk mengambil data dosen berdasarkan kode dosen
    $sql = "SELECT id_pegawai, nama, tgl_lahir, jk, tgl_masuk, posisi FROM t_staff WHERE id_pegawai = '$id_pegawai'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_pegawai = $row["id_pegawai"];
        $nama = $row["nama"];
        $tgl_lahir = $row["tgl_lahir"];
        $jk = $row["jk"];
        $tgl_masuk = $row["tgl_masuk"];
        $posisi = $row["posisi"];
    } else {
        echo "Staff tidak ditemukan.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $id_pegawai = $_POST['id_pegawai'];
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jk'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $posisi = $_POST['posisi'];

    // Query SQL untuk melakukan pembaruan data dosen
    $sql = "UPDATE t_staff SET nama = '$nama', 
                                    tgl_lahir = '$tgl_lahir', 
                                    jk = '$jk', 
                                    tgl_masuk = '$tgl_masuk', 
                                    posisi = '$posisi' 
            WHERE id_pegawai = '$id_pegawai'";

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
    <title>Edit Staff</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Staff</h2>
        <form action="" method="POST">
            <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai; ?>">
            <div class="form-group">
                <label for="nama">Nama Staff:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir:</label>
                <input type="datetime" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $tgl_lahir; ?>" required>
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin:</label>
                <input type="text" class="form-control" id="jk" name="jk" value="<?php echo $jk; ?>" required>
            </div>
            <div class="form-group">
                <label for="tgl_masuk">Tanggal Masuk:</label>
                <input type="datetime" class="form-control" id="tgl_masuk" name="tgl_masuk" value="<?php echo $tgl_masuk; ?>" required>
            </div>
            <div class="form-group">
                <label for="posisi">Posisi:</label>
                <input type="text" class="form-control" id="posisi" name="posisi" value="<?php echo $posisi; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-secondary">Kembali ke Index</a>
        </form>
    </div>
</body>
</html>
