<!-- browseproduk.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Browse Data Penumpang</title>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1;
            padding:  20px 0!important;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <main>
            <h2>Browse Data Penumpang</h2>
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>Kode Penumpang</th>
                        <th>Nama</th>
                        <th>Kota Tujuan</th>
                        <th>Id Pembayaran</th>
                        <th>Kota Keberangkatan</th>
                        <th>Tanggal Keberangkatan</th>
                        <th>Kontak</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    // Koneksi ke database
                    require_once("koneksi.php");

                    // Query SQL untuk mengambil data dari tabel t_master_prd
                    $sql = "SELECT t_penumpang.id_penumpang,
                                    t_penumpang.nama,
                                    t_penumpang.tujuan,
                                    t_penumpang.kota_keberangkatan,
                                    t_penumpang.tgl_berangkat,
                                    t_penumpang.kontak,
                                    t_transaksi.id_transaksi
                                     FROM t_penumpang LEFT JOIN t_transaksi ON t_penumpang.id_penumpang = t_transaksi.id_penumpang";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id_penumpang = $row["id_penumpang"];
                            echo "<tr>";
                            echo "<td>" . $row["id_penumpang"] . "</td>";
                            echo "<td>" . $row["nama"] . "</td>";
                            echo "<td>" . $row["tujuan"] . "</td>";
                            echo "<td>";
                            if ($row["id_transaksi"]) {
                                echo $row["id_transaksi"];
                            } else {
                                echo "<a href='proses_add_transaksi.php?id=" . $row["id_penumpang"] . "'  class='btn btn-primary btn-sm'>Buat</a> ";
                            }
                            echo "</td>";
                            echo "<td>" . $row["kota_keberangkatan"] . "</td>";
                            echo "<td>" . $row["tgl_berangkat"] . "</td>";
                            echo "<td>" . $row["kontak"] . "</td>";
                            echo "<td>";
                            echo "<a href='edit_penumpang.php?id=" . $row["id_penumpang"] . "'  class='btn btn-primary btn-sm'>Edit</a> ";
                            echo "<a href='hapus_penumpang.php?id=" . $row["id_penumpang"] . "' class='btn btn-danger btn-sm ' >Hapus</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada data produk.</td></tr>";
                    }

                    // Tutup koneksi ke database
                    $conn->close();
                    ?>
                </tbody>
            </table>

            <a href="index.php" class="btn btn-primary">Back to Index</a>
        </main>
    </div>
</body>
</html>
