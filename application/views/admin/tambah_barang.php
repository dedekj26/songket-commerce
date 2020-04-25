
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"></h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4 border-left-primary">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Barang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <form action="<?= base_url() ?>admin/simpan_barang" method="post" enctype="multipart/form-data">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                    <tbody>
                      <tr>
                        <td class="align-middle">Nama Barang</td>
                        <td>
                          <input type="text" name="nama_barang" class="form-control" required>
                        </td>
                      </tr>
                      <tr>
                        <td class="align-middle">Pilih Kategori</td>
                        <td>
                          <select name="kategori" id="kategori" class="form-control">
                            <?php
                              foreach ($kategori as $row) :
                            ?>
                          
                            <option value="<?= $row['id_kategori'] ?>"><?= $row['nama_kategori'] ?></option>
                            
                            <?php
                              endforeach; 
                            ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="align-middle">Harga Barang</td>
                        <td>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">Rp. </div>
                            </div>
                            <input type="number" name="harga_barang" class="form-control" required>
                          </div>
                        </td>
                      </tr>                      
                      <tr>
                        <td class="align-middle">Foto Barang</td>
                        <td>
                          <input type="file" name="foto_barang" class="form-control" required>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  
                  <button type="submit" class="btn btn-primary float-right">Simpan</button>
                  <a href="<?= base_url() ?>admin/daftar_barang" class="btn btn-secondary mr-3 float-right">Batal</a>
                  
                </form>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

