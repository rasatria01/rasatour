<?php

$severname  = "localhost";
$username = "root";
$password = "87654321";
$database = "db_tour";

$conn = new mysqli($severname,$username,$password,$database);

if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}