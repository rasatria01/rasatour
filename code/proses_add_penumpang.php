<?php
// Memanggil file koneksi.php untuk melakukan koneksi ke database
require_once("koneksi.php");

// Ambil data dari formulir
$id_penumpang = $_POST['id_penumpang'];
$nama = $_POST['nama'];
$tujuan = $_POST['tujuan'];
$tgl_berangkat = $_POST['tgl_berangkat'];
$kontak = $_POST['kontak'];
$id_travel = $_POST['id_travel'];
$asal = $_POST['asal'];



// Query SQL untuk memeriksa apakah kode_prd sudah ada dalam database
$check_sql = "SELECT id_penumpang FROM t_penumpang WHERE id_penumpang = '$id_penumpang'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    echo "<script>
            alert('Kode Produk sudah ada dalam database. Silakan gunakan kode yang berbeda.');
            window.location.href = 'add_penumpang.php';
          </script>";
} else {
    // Query SQL untuk memasukkan data ke dalam tabel t_master_prd
    $insert_sql = "INSERT INTO t_penumpang (id_penumpang,id_travel, tujuan, kontak, tgl_berangkat, nama, kota_keberangkatan) 
                    VALUES ('$id_penumpang','$id_travel', '$tujuan', '$kontak', '$tgl_berangkat', '$nama', '$asal')";

    if ($conn->query($insert_sql) === TRUE) {
        $insert_sql = "INSERT INTO t_transaksi (id_transaksi,id_penumpang,id_travel,status) VALUES ('$id_transaksi','$id_penumpang','$id_travel','$status')";
        $result = $conn->query($insert_sql);
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
