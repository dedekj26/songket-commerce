
<body class="bg-gradient-primary">

  <div class="container">
    
    <div class="flash-data" data-login="<?= $this->session->flashdata('login'); ?>"></div>

    <!-- Outer Row -->
    <div class="row justify-content-center my-5">

      <div class="col-xl-6 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">

            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12 mx-auto">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                  </div>

                  <form action="<?= base_url() ?>auth/login" method="POST" class="user">
                    <div class="form-group">
                      <input  type="text" 
                              class="form-control form-control-user" 
                              name="username" 
                              aria-describedby="emailHelp" 
                              placeholder="Masukkan Username" 
                              value="<?= set_value('username'); ?>"
                              required>
                    </div>

                    <div class="form-group">
                      <input  type="password" 
                              class="form-control form-control-user" 
                              name="password" 
                              placeholder="Password" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>

                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url() ?>">Kembali ke home</a>
                  </div>
<!--                   <div class="text-center">
                    <a class="small" href="<?= base_url() ?>auth/daftar">Buat Akun!</a>
                  </div> -->

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>