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
        <title>Data Wilayah Ongkir</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      <?php include "navbar.php"?>
      
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Wilayah</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item active">kota</li>
                        </ol>
                        <div class="col-md-2">  
                            <div class="form-group mt-4 mb-0">
                                <a class="btn btn-primary btn-block" href="tambah_kota">Tambah kota</a>
                            </div>
                        </div>
                        <!-- table -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Tabel kota
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                  <?php
                                   $query = $konek->query("SELECT * FROM `tb_ongkir`");
                                  ?>
                                  
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th hidden>ID Ongkir</th>
                                                <th>Nama Kota</th>
                                                <th>Harga Ongkir</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                             <?php

                                                $no = 1;
                                                while ($data = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr>
                                                <td><?=$no++; ?></td>
                                                <td hidden><?=$data['id_ongkir'];?></td>
                                                <td><?= $data['alamat'];?></td>
                                                <td><?= $data['harga_ongkir']; ?></td>
                                                <td>
                                                    <a href="edit_kota?&id=<?= $data['id_ongkir'] ?>" class="editbtn border-0 btn-transition btn btn-outline-warning" type="button"> <i class="fa fa-edit"></i> </a> 
                                                    <a href="hapus_kota?&id=<?= $data['id_ongkir'] ?>" class="deletebtn border-0 btn-transition btn btn-outline-danger" type="button"> <i class="fa fa-trash"></i> </a> 
                                                </td>   
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end of table -->
                    </div>
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
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
