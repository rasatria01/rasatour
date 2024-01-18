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
    <title>Browse Data Transaksi</title>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="mx-auto mt-5">
        <main>
            <h2>Browse Data Transaksi</h2>
            <table class="table ">
                <thead class="table-primary">
                    <tr>
                        <th>Kode Transaksi</th>
                        <th>Nama Penumpang</th>
                        <th>Jurusan Travel</th>
                        <th>Kota Tujuan</th>
                        <th>Hari Keberangkatan</th>
                        <th>Harga</th>
                        <th>Status Pembayaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    // Koneksi ke database
                    require_once("koneksi.php");

                    // Query SQL untuk mengambil data dari tabel t_master_prd
                    $sql = "SELECT t_transaksi.id_transaksi, 
                                    t_penumpang.nama, 
                                    t_penumpang.tujuan as destinasi,
                                    t_travel.tujuan , 
                                    t_travel.kota_berangkat,
                                    t_penumpang.tgl_berangkat,
                                    t_travel.harga,
                                    t_transaksi.statuss
                                    FROM t_transaksi
                                    JOIN t_penumpang
                                    ON t_transaksi.id_penumpang = t_penumpang.id_penumpang
                                    JOIN t_travel
                                    ON t_travel.id_travel = t_transaksi.id_travel";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_transaksi"] . "</td>";
                            echo "<td>" . $row["nama"] . "</td>";
                            echo "<td>" . $row["kota_berangkat"] ."-". $row["tujuan"]. "</td>";
                            echo "<td>" . $row["destinasi"] . "</td>";
                            echo "<td>" . $row["tgl_berangkat"] . "</td>";
                            echo "<td>" . $row["harga"] . "</td>";
                            echo "<td>" . $row["statuss"] . "</td>";
                            echo "<td>";
                            $ops = $row["statuss"] == "Lunas" ?  "Batal" : "Bayar";
                            echo "<a href='edit_transaksi.php?id=" . $row["id_transaksi"] ."&statuss=".$row["statuss"]. "'  class='btn btn-primary btn-sm'>". $ops ."</a> ";
                            echo "<a href='hapus_transaksi.php?id=" . $row["id_transaksi"] . "' class='btn btn-danger btn-sm ' >Hapus</a>";
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
