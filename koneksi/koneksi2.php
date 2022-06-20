<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "cucisepatu";
$konek = mysqli_connect($host, $user, $password, $database);

if (!$konek) {
    echo "gagal konek" . mysqli_connect_error();
}
error_reporting(0);
