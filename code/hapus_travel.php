<?php
// Koneksi ke database
require_once("koneksi.php");

$id_travel = '';



if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $id_travel = $_GET["id"];
    # code...
    $sql = "DELETE FROM t_travel WHERE id_travel = '$id_travel'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect kembali ke halaman index.php setelah berhasil menghapus
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
    <title>Hapus Travel</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Hapus Travel</h2>
        <p>Anda yakin ingin menghapus travel ini?</p>
        <form action="" method="POST">

            <input type="hidden" name="id_travel" value="<?php echo $id_travel; ?>">
            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
