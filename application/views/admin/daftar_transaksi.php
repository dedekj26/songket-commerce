
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-jenis="Transaksi"></div>

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"></h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
            </div>
            <div class="card-body">
              
<!--               <form action="<?= base_url() ?>admin/set_tahun" class="row">
                <div class="col-4">
                    <input type="text" name="tahun" placeholder="Pilih Tahun" id="datepicker" class="mb-3 form-control" />
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
              </form> -->

              <div class="table-responsive">
                <table class="table table-bordered dt-responsive nowrap" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Transaksi</th>
                      <th>Nama Pelanggan</th>
                      <th>Total Harga</th>
                      <th>Tanggal Transaksi</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $n = 1;
                      foreach ($transaksi as $row) :
                    ?>

                    <tr>
                      <td><?= $n; ?></td>
                      <td><?= $row['kode_transaksi']; ?></td>
                      <td><?= $row['nama_pelanggan']; ?></td>
                      <td>Rp. <?= $row['total_bayar']; ?></td>
                      <td><?= $row['tgl_transaksi']; ?></td>
                      <td>
                        <?php
                            if( $row['status_transaksi'] == 'PENDING' ){
                              echo "<span class='badge badge-info'>";
                            } elseif( $row['status_transaksi'] == 'SUCCESS' ) {
                              echo "<span class='badge badge-success'>";
                            } elseif( $row['status_transaksi'] == 'FAILED' ) {
                              echo "<span class='badge badge-warning'>";
                            } else {
                              echo "<span>";
                            } 
                            echo $row['status_transaksi'];
                        ?></span>
                      <td>
                          <a  href="#mymodal"
                              data-remote="<?= base_url() ?>admin/transaksi/detail_transaksi/<?= $row['id_transaksi']; ?>"
                              data-title="Detail Transaksi <?= $row['kode_transaksi']; ?>"
                              data-toggle="modal"
                              data-target="#mymodal"
                              data-id="<?= $row['id_transaksi']; ?>"
                              class="btn btn-info btn-sm">
                              <i class="fa fa-desktop"></i> Detail
                          </a>
                      </td>
                    </tr>

                    <?php
                      $n++;
                      endforeach; 
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->