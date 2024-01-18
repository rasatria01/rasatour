<?php
// Koneksi ke database
require_once("koneksi.php");

$id_tour = '';



if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $id_tour = $_GET["id"];
    # code...
    $sql = "DELETE FROM t_tour WHERE id_tour = '$id_tour'";

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
    <title>Hapus Tour</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Hapus Tour</h2>
        <p>Anda yakin ingin menghapus tour ini?</p>
        <form action="" method="POST">

            <input type="hidden" name="id_tour" value="<?php echo $id_tour; ?>">
            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
