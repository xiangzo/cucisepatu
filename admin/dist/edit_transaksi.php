<?php
session_start();
if ($_SESSION['status'] != "Login") {
    # code...
    header("location:login.php?pesan=belum_login");
  }
  include "koneksi.php"
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Cuci Sepatu</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        
        <?php include "./navbar.php" ?>
        
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Edit Transaksi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="transaksi">Data Transaksi</a></li>
                            <li class="breadcrumb-item active">Edit Transaksi</li>
                        </ol>
                    </div>
                    
                    <?php
                    include "koneksi.php";
                    $id = $_GET['id'];
                    $query_mysql = mysqli_query($konek,"select * from tb_transaksi t inner join tb_pelanggan p on t.id_pelanggan=p.id_pelanggan where id_transaksi='$id'");
                    $nomor = 1;
                    $data = mysqli_fetch_array($query_mysql);
                    ?>

                    <form action="" method="post">
                      <div class="form-group">
                        <div class="col-md-6">                        
                          <label class="small mb-1" for="nama">ID Transaksi</label>
                          <input class="form-control py-4" name="id" type="text" value="<?php echo $data['id_transaksi']   ?> "readonly/>
                        </div>
                        <div class="col-md-6">                        
                          <label class="small mb-1" for="diskon">Nama Pelanggan</label>
                          <input class="form-control py-4" name="nama" type="text" value="<?php echo $data['nama_pelanggan']   ?> "readonly/>
                        </div>
                        <div class="col-md-6">                        
                          <label class="small mb-1" for="diskon">Tanggal Pesanan</label>
                          <input class="form-control py-4" name="tgl" type="text" value="<?php echo $data['tanggal_transaksi']   ?> "readonly/>
                        </div>
                        <div class="col-md-6">                        
                          <label class="small mb-1" for="diskon">Total</label>
                          <input class="form-control py-4" name="total" type="text" value="<?php echo $data['total']   ?> "readonly/>
                        </div>
                        <div class="col-md-6">                        
                          <label class="small mb-1" for="diskon">Bukti Bayar</label>
                          <img src="bukti_bayar/<?php echo $data['bukti_bayar']   ?>" width="600px">
                        </div>

                        <div class="form-group mt-4 mb-0">
                        <?php
                        if($data['status']=="bayar"){
                        ?>
                            <button type="submit" class="btn btn-primary btn-block" name="konfirmasi">Konfirmasi Pesanan</button>
                            <button type="submit" class="btn btn-danger btn-block" name="batal">Batalkan</button>
                            <?php
                             } elseif ($data['status']=="proses"){
                            ?>
                            <button type="submit" class="btn btn-success btn-block" name="selesai">Selesai</button>
                            <?php
                             }
                            ?>
                        </div>
                      </div>
                    </form>
                    <?php 
                    if (isset($_POST['konfirmasi'])) {
                        $id=$_POST['id'];
                        $idp=$_SESSION['id_petugas'];
                        mysqli_query($konek,"update tb_transaksi set status='proses', id_petugas='$idp' where id_transaksi='$id'");
                        echo "<script>alert('Berhasil');location='edit_transaksi.php?id=$id'</script>";
                     }
                     if (isset($_POST['selesai'])) {
                        $id=$_POST['id'];
                        $idp=$_SESSION['id_petugas'];
                        mysqli_query($konek,"update tb_transaksi set status='selesai', id_petugas='$idp' where id_transaksi='$id'");
                        echo "<script>alert('Pesanan Selesai');location='edit_transaksi.php?id=$id'</script>";
                     }
                     if (isset($_POST['batal'])) {
                        $id=$_POST['id'];
                        $idp=$_SESSION['id_petugas'];
                        mysqli_query($konek,"update tb_transaksi set status='dibatalkan', id_petugas='$idp' where id_transaksi='$id'");
                        echo "<script>alert('Pesanan Dibatalkan')</script>";
                     }
                    ?>  
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>