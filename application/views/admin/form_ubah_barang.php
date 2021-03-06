
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
                <form action="<?= base_url() ?>admin/barang/ubah_barang/<?= $id_barang ?>" method="post" enctype="multipart/form-data">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                    <tbody>
                      
                      <?php
                        foreach ($barang as $row) :
                      ?>

                      <tr>
                        <td class="align-middle">Nama Barang</td>
                        <td>
                          <input type="text" name="nama_barang" class="form-control" value="<?= $row['nama_barang']; ?>" required>
                        </td>
                      </tr>
                      <tr>
                        <td class="align-middle">Deskripsi Barang</td>
                        <td>
                          <textarea name="deskripsi_barang" id="deskripsi_barang" class="form-control" rows="10" required><?= $row['deskripsi_barang']; ?></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td class="align-middle">Pilih Kategori</td>
                        <td>
                          <select name="kategori" id="kategori" class="form-control">
                            <?php
                              foreach ($kategori as $kat) :
                            ?>
                          
                            <option value="<?= $kat['id_kategori'] ?>" 
                            <?php
                                if($row['id_kategori'] == $kat['id_kategori']){
                                    echo "selected";
                                }
                            ?>
                            ><?= $kat['nama_kategori'] ?></option>
                            
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
                            <input type="number" name="harga_barang" class="form-control" value="<?= $row['harga_barang'] ?>" required>
                          </div>
                        </td>
                      </tr>                      
                      <tr>
                        <td class="align-middle">Foto Barang</td>
                        <td>
                          <input type="file" name="foto_barang" class="form-control">
                          <input type="hidden" name="foto_barang_lama" value="<?= $row['foto_barang'] ?>">
                        </td>
                      </tr>
                      
                      <?php
                        endforeach; 
                      ?>

                    </tbody>
                  </table>
                  
                  <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                  <a href="<?= base_url() ?>admin/barang" class="btn btn-secondary mr-3 float-right"><i class="fa fa-arrow-left"></i> Batal</a>

                </form>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

