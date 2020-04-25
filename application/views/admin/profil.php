
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"></h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4 border-left-primary">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Profil Akun</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <tbody>
                    <tr>
                      <td>Nama Lengkap</td>
                      <td>Dedek Julian</td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <td>Laki - Laki</td>
                    </tr>
                    <tr>
                      <td>Tempat, Tanggal Lahir</td>
                      <td>Sukaraja, 26 Juli 1999</td>
                    </tr> 
                    <tr>
                      <td>Username</td>
                      <td>dedekj26</td>
                    </tr>
                    <tr>
                      <td>Foto Profil</td>
                      <td>
                          <img src="<?= base_url() ?>assets/img/profile.jpg" alt="" style="width: 200px;">
                      </td>
                    </tr>
                  </tbody>
                </table>

                <a href="<?= base_url() ?>admin/edit_profil">
                  <button type="button" class="btn btn-primary float-right"><i class="fa fa-edit"></i> Edit Profil</button>
                </a>

              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
