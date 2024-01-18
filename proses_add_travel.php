<?php
// Memanggil file koneksi.php untuk melakukan koneksi ke database
require_once("koneksi.php");

// Ambil data dari formulir
$id_travel = $_POST['id_travel'];
$tujuan = $_POST['tujuan'];
$kota_berangkat = $_POST['Asal'];
$jadwal = $_POST['jadwal'];
$jam_brgkt = $_POST['jam_brgkt'];
$kapasitas = $_POST['kapasitas'];
$harga = $_POST['harga'];

// Query SQL untuk memeriksa apakah kode_prd sudah ada dalam database
$check_sql = "SELECT id_travel FROM t_travel WHERE id_travel = '$id_travel'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    echo "<script>
            alert('Kode Produk sudah ada dalam database. Silakan gunakan kode yang berbeda.');
            window.location.href = 'add_trayek.php';
          </script>";
} else {
    // Query SQL untuk memasukkan data ke dalam tabel t_master_prd
    $insert_sql = "INSERT INTO t_travel (id_travel, tujuan, kapasitas, jadwal, jam_berangkat, kota_berangkat, harga) 
                    VALUES ('$id_travel', '$tujuan', '$kapasitas', '$jadwal', '$jam_brgkt', '$kota_berangkat', '$harga')";

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
