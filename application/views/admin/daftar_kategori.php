 
        <!-- Begin Page Content -->
        <div class="container-fluid">
          
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-jenis="Kategori"></div>

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"></h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori</h6>
              <a href="<?= base_url() ?>admin/tambah_kategori" class="btn btn-primary">
                <i class="fa fa-plus"></i>&nbsp Tambah Data
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kategori</th>
                      <th>Deskripsi Kategori</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    $n = 1;
                      foreach ($kategori as $row) :
                    ?>

                      <tr>
                        <td><?= $n; ?></td>
                        <td><?= $row['nama_kategori']; ?></td>
                        <td><?= $row['deskripsi_kategori']; ?></td>
                        <td>
                          <a href="<?= base_url() ?>admin/hapus_kategori/<?= $row['id_kategori'] ?>" class="btn btn-danger btn-sm tombol-hapus">
                            <i class="fa fa-trash"></i>
                          </a>
                          <a href="<?= base_url() ?>admin/form_ubah_kategori/<?= $row['id_kategori'] ?>" class="btn btn-sm btn-success">
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
