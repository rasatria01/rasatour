<?php

require_once("koneksi.php");

// Inisialisasi variabel
if (isset($_GET["id"]) && isset($_GET["statuss"])) {
    # code...
    $id_transaksi = $_GET["id"];
    
    $status = $_GET["statuss"];

    if ($status === "Lunas") {
        $statt = "Belum Lunas";
        $update_sql = "UPDATE t_transaksi SET statuss = '$statt' WHERE id_transaksi = '$id_transaksi'";
        if ($conn->query($update_sql) === TRUE) {
            header("Location: index.php"); // Redirect kembali ke halaman index.php setelah berhasil mengedit
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $statt = "Lunas";
        $update_sql = "UPDATE t_transaksi SET statuss = '$statt' WHERE id_transaksi = '$id_transaksi'";
        if ($conn->query($update_sql) === TRUE) {
            header("Location: index.php"); // Redirect kembali ke halaman index.php setelah berhasil mengedit
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

