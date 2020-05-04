
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"></h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4 border-left-primary">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Kategori</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <form action="<?= base_url() ?>admin/kategori/ubah_kategori/<?= $id_kategori ?>" method="post">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                    <tbody>

                      <?php
                        foreach ($kategori as $row) :
                      ?>

                      <tr>
                        <td class="align-middle">Nama Kategori</td>
                        <td>
                          <input type="text" name="nama_kategori" class="form-control" value="<?= $row['nama_kategori']; ?>" required>
                        </td>
                      </tr>
                      <tr>
                        <td class="align-middle">Deskripsi Kategori</td>
                        <td>
                          <input type="text" name="deskripsi_kategori" class="form-control" value="<?= $row['deskripsi_kategori']; ?>" required>
                        </td>
                      </tr>

                      <?php
                        endforeach;
                      ?>
                      
                    </tbody>
                  </table>
                  
                  <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                  <a href="<?= base_url() ?>admin/kategori" class="btn btn-secondary mr-3 float-right"><i class="fa fa-arrow-left"></i> Batal</a>

                </form>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
