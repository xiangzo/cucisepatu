<?php
include "koneksi.php";

if (isset($_POST['tambah'])) {
$nama = $_POST['nama'];
$harga = $_POST['harga'];

$query = mysqli_query($konek,"insert into tb_ongkir values ('','$nama','$harga')");
header("location:kota.php?pesan=input berhasil");
}

?>