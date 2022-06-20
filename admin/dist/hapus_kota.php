<?php
include "koneksi.php";
$id = $_GET['id'];
mysqli_query($konek,"delete from tb_ongkir where id_ongkir='$id'");

header("location:kota.php?pesan=berhasil dihapus");
?>