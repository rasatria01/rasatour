<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Rasa Tour</title>
    <style>
        body {
            padding-top: 0; /* Menyesuaikan dengan tinggi navbar */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: #067FC4;
        }

        .container-fluid {
            margin-top: 0; /* Menyesuaikan dengan tinggi navbar */
            flex: 1; /* Menggunakan semua ruang yang tersedia */
        }

        .main-content {
            padding: 20px;
        }

        footer {
            background-color: #067FC4; /* Warna latar belakang yang sesuai */
        }
        a {
            color: #000;
        }
    </style>
    <script>
        $(document).ready(function(){
            // Fungsi untuk memuat konten dinamis menggunakan AJAX
            function loadContent(url){
                $.get(url, function(data){
                    // Menyematkan konten ke dalam elemen dengan id "mainContent"
                    $("#mainContent").html(data);
                });
            }

            // Mengatur konten default pada halaman pertama
            loadContent("home.php");

            // Mengatur fungsi klik untuk setiap menu
            $("#homeBtn").click(function(){
                loadContent("home.php");
            });

            $("#addTravelBtn").click(function(){
                loadContent("add_travel.php");
            });

            $("#browseTravelBtn").click(function(){
                loadContent("browse_travel.php");
            });

            $("#addTourBtn").click(function(){
                loadContent("add_tour.php");
            });

            $("#browseTourBtn").click(function(){
                loadContent("browse_tour.php");
            });

            $("#addPenumpangBtn").click(function(){
                loadContent("add_penumpang.php");
            });

            $("#browsePenumpangBtn").click(function(){
                loadContent("browse_penumpang.php");
            });

            $("#addStaffBtn").click(function(){
                loadContent("add_staff.php");
            });

            $("#browseStaffBtn").click(function(){
                loadContent("browse_staff.php");
            });

            $("#browseTransaksiBtn").click(function(){
                loadContent("browse_transaksi.php");
            });


            $("#aboutBtn").click(function(){
                loadContent("about.php");
            });
        });
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="#">Rasa Tour</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a id="homeBtn" class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="travelDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tour & Travel
                    </a>
                    <div class="dropdown-menu" aria-labelledby="travelDropdown">
                        <a class="dropdown-item" id="addTravelBtn" href="#">Add Travel</a>
                        <a class="dropdown-item" id="browseTravelBtn" href="#">Browse Travel</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" id="addTourBtn" href="#">Add Tour</a>
                        <a class="dropdown-item" id="browseTourBtn" href="#">Browse Tour</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="penumpangDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Passenger & Staff
                    </a>
                    <div class="dropdown-menu" aria-labelledby="penumpangDropdown">
                        <a class="dropdown-item" id="addPenumpangBtn" href="#">Add Passenger</a>
                        <a class="dropdown-item" id="browsePenumpangBtn" href="#">Browse Passenger</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" id="addStaffBtn" href="#">Add Staff</a>
                        <a class="dropdown-item" id="browseStaffBtn" href="#">Browse Staff</a>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" id="browseTransaksiBtn" href="#">Transaksi</a>                    
                </li>
                <li class="nav-item">
                    <a id="aboutBtn" class="nav-link" href="#">About The Application</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="main-content" id="mainContent">
            <!-- Konten utama akan diisikan setelah menu diklik -->
            <h2>Welcome to Rasa Tour</h2>
            <p>Enjoy your best holiday</p>
        </div>
    </div>

    <!-- <footer>
        <p>Aplikasi Rasa Tour n Travel</p>
    </footer> -->
    <footer class="d-flex justify-content-between align-items-center py-2 px-4">
        
            <span class="mb-3 mb-md-0 text-body-secondary">2023 Rasa Tour, Inc</span>
            <div class="">
                
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                    </svg>
                </a><a href=""class="mx-2">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg>
                </a>
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                    </svg>
                </a>
            </div>
    </footer>
</body>
</html>
