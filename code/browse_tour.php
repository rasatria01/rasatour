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
    <title>Browse Data Tour</title>
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
    <div class="container mt-5">
        <main>
            <h2>Browse Data Tour</h2>
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>Kode Tour</th>
                        <th>Nama</th>
                        <th>Tujuan</th>
                        <th>Durasi</th>
                        <th>Fasilitas</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    // Koneksi ke database
                    require_once("koneksi.php");

                    // Query SQL untuk mengambil data dari tabel t_master_prd
                    $sql = "SELECT * FROM t_tour";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_tour"] . "</td>";
                            echo "<td>" . $row["nama"] . "</td>";
                            echo "<td>" . $row["tujuan"] . "</td>";
                            echo "<td>" . $row["durasi"] . "</td>";
                            echo "<td>" . $row["fasilitas"] . "</td>";
                            echo "<td>" . $row["harga"] . "</td>";
                            echo "<td>";
                            echo "<a href='edit_tour.php?id=" . $row["id_tour"] . "'  class='btn btn-primary btn-sm'>Edit</a> ";
                            echo "<a href='hapus_tour.php?id=" . $row["id_tour"] . "' class='btn btn-danger btn-sm ' >Hapus</a>";
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
