
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-jenis="Barang"></div>

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"></h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Barang</h6>
              <a href="<?= base_url() ?>admin/tambah_barang" class="btn btn-primary">
                <i class="fa fa-plus"></i>&nbsp Tambah Data
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Kategori</th>
                      <th>Harga</th>
                      <th>Foto Barang</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $n = 1;
                      foreach ($barang as $row) :
                    ?>

                    <tr>
                      <td class="text-center align-middle"><?= $n; ?></td>
                      <td class="align-middle"><?= $row['nama_barang']; ?></td>

                      <td class="align-middle"><?php
                      foreach ($kategori as $kat) {
                        if( $row['id_kategori'] ==  $kat['id_kategori'] )
                        {
                          echo $kat['nama_kategori'];
                        }
                      }
                      ?></td>

                      <td class="align-middle">Rp. <?= $row['harga_barang']; ?></td>
                      <td class="text-center align-middle"><img src="<?= base_url() ?>assets/img/barang/<?= $row['foto_barang']; ?>" alt="Foto Barang" height="90" width="90"></td>
                      <td>
                          <a href="<?= base_url() ?>admin/hapus_barang/<?= $row['id_barang'] ?>" class="btn btn-danger tombol-hapus">
                            <i class="fa fa-trash"></i>
                          </a>
                          <a href="<?= base_url() ?>admin/form_ubah_barang/<?= $row['id_barang'] ?>" class="btn btn-success">
                            <i class="fa fa-edit"></i>
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