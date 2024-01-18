<?php
// Memanggil file koneksi.php untuk melakukan koneksi ke database
require_once("koneksi.php");

// Ambil data dari formulir
$id_tour = $_POST['id_tour'];
$nama = $_POST['nama'];
$tujuan = $_POST['tujuan'];
$durasi = $_POST['durasi'];
$fasilitas = $_POST['fasilitas'];
$harga = $_POST['harga'];

// Query SQL untuk memeriksa apakah kode_prd sudah ada dalam database
$check_sql = "SELECT id_tour FROM t_tour WHERE id_tour = '$id_tour'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    echo "<script>
            alert('Kode Produk sudah ada dalam database. Silakan gunakan kode yang berbeda.');
            window.location.href = 'add_trayek.php';
          </script>";
} else {
    // Query SQL untuk memasukkan data ke dalam tabel t_master_prd
    $insert_sql = "INSERT INTO t_tour (id_tour, tujuan, fasilitas, durasi, nama, harga) 
                    VALUES ('$id_tour', '$tujuan', '$fasilitas', '$durasi', '$nama', '$harga')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "<script>
                alert('Input berhasil.');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi ke database
$conn->close();
?>
