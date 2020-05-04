
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="flash-data" data-login="<?= $this->session->flashdata('login'); ?>"></div>

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"></h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4 border-left-primary">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Profil Akun</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <form action="<?= base_url() ?>admin/profil/ubah_profil/<?= $id_user; ?>" method="post" enctype="multipart/form-data">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                    <tbody>
                      
                      <?php
                      foreach ($user_data as $row) :
                      ?>

                      <tr>
                        <td class="align-middle">Nama Lengkap</td>
                        <td>
                          <input  type="text" 
                                  name="nama_lengkap" 
                                  class="form-control" 
                                  value="<?= $row['nama_operator']; ?>" required>
                        </td>
                      </tr>
                      <tr>
                        <td class="align-middle">Jenis Kelamin</td>
                        <td>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="Laki-Laki" 
                                <?php
                                    if($row['jenis_kelamin'] == "Laki-Laki"){
                                        echo "selected";
                                    }
                                ?>
                                >Laki-Laki</option>
                                <option value="Perempuan" 
                                <?php
                                    if($row['jenis_kelamin'] == "Perempuan"){
                                        echo "selected";
                                    }
                                ?>
                                >Perempuan</option>
                            </select>
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">Tempat Lahir</td>
                        <td>
                          <input  type="text" 
                                  name="tempat_lahir" 
                                  class="form-control" 
                                  value="<?= $row['tempat_lahir']; ?>"
                                  required>
                        </td>
                      </tr> 
                      <tr>
                        <td class="align-middle">Tanggal Lahir</td>
                        <td>
                          <input  type="date" 
                                  name="tanggal_lahir" 
                                  class="form-control"
                                  value="<?= $row['tanggal_lahir']; ?>"
                                  required>
                        </td>
                      </tr>
                      <tr>
                        <td class="align-middle">Username</td>
                        <td>
                          <input  type="text" 
                                  name="admin" 
                                  class="form-control" 
                                  value="<?= $row['username']; ?>"
                                  readonly>
                        </td>
                      </tr>
                      <tr>
                        <td class="align-middle">Konfirmasi Password</td>
                        <td>
                          <input  type="password" 
                                  name="password" 
                                  class="form-control" required>
                        </td>
                      </tr>
                      <tr>
                        <td class="align-middle">Foto Profil</td>
                        <td>
                            <input type="file" name="foto_profil" class="form-control">
                            <input  type="hidden" 
                                    name="foto_profil_lama" 
                                    class="form-control" 
                                    value="<?= $row['foto']; ?>">
                        </td>
                      </tr>
                      
                      <?php
                        endforeach; 
                      ?>

                    </tbody>
                  </table>

                  <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                  <a href="<?= base_url() ?>admin/profil/index/<?= $row['id_operator']; ?>" class="btn btn-secondary mr-3 float-right"><i class="fa fa-arrow-left"></i> Batal</a>

                </form>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
