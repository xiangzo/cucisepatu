<?php
include "koneksi.php";

if (isset($_POST['tambah'])) {
$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];

$query = mysqli_query($konek,"update tb_ongkir set alamat='$nama', harga_ongkir='$harga' where id_ongkir='$id'");
header("location:kota.php?pesan=input berhasil");
}

?>