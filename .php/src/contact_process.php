<?php
include "koneksi/koneksi.php";

if (isset($_POST['send'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];
  
  $query = mysqli_query($konek,"insert into kontak values ('','$name','$email','$phone','$message')");
  echo "<script>alert('Pesan anda telah terkirim !');location='index.php'</script>";
  } 
?>