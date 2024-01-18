<?php
// Memanggil file koneksi.php untuk melakukan koneksi ke database
require_once("koneksi.php");

// Ambil data dari formulir
$id_staff = $_POST['id_staff'];
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$tgl_masuk = $_POST['tgl_masuk'];
$posisi = $_POST['posisi'];

// Query SQL untuk memeriksa apakah kode_prd sudah ada dalam database
$check_sql = "SELECT id_pegawai FROM t_staff WHERE id_pegawai = '$id_staff'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    echo "<script>
            alert('Kode Produk sudah ada dalam database. Silakan gunakan kode yang berbeda.');
            window.location.href = 'add_trayek.php';
          </script>";
} else {
    // Query SQL untuk memasukkan data ke dalam tabel t_master_prd
    $insert_sql = "INSERT INTO t_staff (id_pegawai, tgl_lahir, tgl_masuk, jk, nama, posisi) 
                    VALUES ('$id_staff', '$tgl_lahir', '$tgl_masuk', '$jk', '$nama', '$posisi')";

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
