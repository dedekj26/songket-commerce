
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Lihat Laporan </a> -->
          </div>

          <div class="pie-chart-custom" id="success-pie" value="<?= $success; ?>" ></div>
          <div class="pie-chart-custom" id="pending-pie" value="<?= $pending; ?>" ></div>
          <div class="pie-chart-custom" id="failed-pie" value="<?= $failed; ?>" ></div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Penghasilan (Bulan)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 400.000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Penghasilan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 
                        <?php
                          $total = 0;
                          foreach ($penghasilan as $row) :
                            $total += $row['total_bayar'];
                          endforeach;

                          echo number_format($total);
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
<!--             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Transaksi Pending</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $pending; ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Konfirmasi Pembayaran</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pending; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Transaksi Terbaru</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                     <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Kode Transaksi</th>
                              <th>Total Harga</th>
                              <th>Tanggal Transaksi</th>
                              <th>Status</th>
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
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Catatan Transaksi</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> SUCCESS
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> PENDING
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> FAILED
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->

            <div class="col mb-4">

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tentang Kami</h6>
                </div>
                <div class="card-body">
                  <p>Aplikasi ini dibuat oleh Kelompok Songket. aplikasi ini dikhususkan sebagai aplikasi penjualan berbasis web pada songket Hj Cek Ipah HS, Hj Cek Ila MS.</p>
                  <p class="mb-0">dengan anggota kelompok Dedek Julian, Eni Permata Sari, dan Ryan Kresna Dewa.</p>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->