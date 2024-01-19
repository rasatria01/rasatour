<?php

require_once("koneksi.php");

$status = "Belum Lunas";
$id_penumpang = "";
$id_transaksi = "";
if (isset($_GET["id"])) {
    
    $id_penumpang = $_GET["id"];
    $sql = "SELECT id_travel FROM t_penumpang WHERE id_penumpang = '$id_penumpang'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_travel = $row["id_travel"];

        $id_transaksi = str_replace("220","990",$id_penumpang);
        $insert_sql = "INSERT INTO t_transaksi (id_transaksi,id_penumpang,id_travel,statuss) VALUES ('$id_transaksi','$id_penumpang','$id_travel','$status')";
        if ($conn->query($insert_sql) === TRUE) {
            echo "<script>
                alert('Input berhasil.');
                window.location.href = 'index.php';
              </script>";
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }

    } else {
        echo "Penumpang tidak ditemukan.";
    }
}