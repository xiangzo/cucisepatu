<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Transaksi
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <?php
          $query = $konek->query("SELECT t.id_transaksi,t.id_pelanggan,p.nama_pelanggan,t.status,t.total FROM tb_transaksi t INNER JOIN tb_pelanggan p ON t.id_pelanggan=p.id_pelanggan");
          ?>  
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>ID Transaksi</th>
                      <th>Nama Pelanggan</th>
                      <th>Status</th>
                      <th>Total</th>
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
                      <td><?= $data['id_transaksi'];?></td>
                      <td><?= $data['nama_pelanggan'];?></td>
                      <td><?= $data['status']; ?></td>
                      <td>Rp. <?= $data['total']; ?></td>
                      <td>                                                
                      <a href="edit_transaksi?id=<?php echo $data['id_transaksi'] ?>" class="editbtn border-0 btn-transition btn btn-outline-warning" type="button"> <i class="fa fa-edit"></i> </a> 
                      </td>

                  </tr>
                  <?php } ?>
              </tbody>
          </table>
        </div>
    </div>
</div>
