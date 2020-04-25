
        <!-- Begin Page Content -->
        <div class="container-fluid">

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
                <form action="#" method="post">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                    <tbody>
                      <tr>
                        <td class="align-middle">Nama Lengkap</td>
                        <td>
                          <input type="text" name="nama_lengkap" class="form-control" required>
                        </td>
                      </tr>
                      <tr>
                        <td class="align-middle">Jenis Kelamin</td>
                        <td>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                          </td>
                      </tr>
                      <tr>
                        <td class="align-middle">Tempat Lahir</td>
                        <td>
                          <input type="text" name="tempat_lahir" class="form-control" required>
                        </td>
                      </tr> 
                      <tr>
                        <td class="align-middle">Tanggal Lahir</td>
                        <td>
                          <input type="text" name="username" class="form-control" data-provide="datepicker" required>
                        </td>
                      </tr> 
                      <tr>
                        <td class="align-middle">Username</td>
                        <td>
                          <input type="text" name="username" class="form-control" required>
                        </td>
                      </tr>
                      <tr>
                        <td class="align-middle">Konfirmasi Password</td>
                        <td>
                          <input type="password" name="password" class="form-control" required>
                        </td>
                      </tr>
                      <tr>
                        <td class="align-middle">Foto Profil</td>
                        <td>
                            <input type="file" name="foto_profil" class="form-control">
                        </td>
                      </tr>
                    </tbody>
                  </table>

                  <button type="submit" class="btn btn-primary float-right">Simpan</button>

                </form>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
