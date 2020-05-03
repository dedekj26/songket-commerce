
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"></h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Penjualan Tahun 2020</h6>
            </div>
            <div class="card-body">
              
              <form action="<?= base_url() ?>admin/set_tahun" class="row">
                <div class="col-4">
                    <input type="text" name="tahun" placeholder="Pilih Tahun" id="datepicker" class="mb-3 form-control" />
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
              </form>

              <div class="table-responsive">
                <table class="table table-bordered dt-responsive nowrap" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Penjualan</th>
                      <th>Total Harga</th>
                      <th>Tanggal Penjualan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>BS001</td>
                      <td>Rp. 520.000</td>
                      <td>12 Februari 2020</td>
                      <td>
                         <a href="<?= base_url() ?>admin/detail_penjualan/" class="btn btn-success btn-sm">
                            <i class="fa fa-desktop"></i> Detail
                          </a>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>KS002</td>
                      <td>Rp. 120.000</td>
                      <td>14 Februari 2020</td>
                      <td>
                         <a href="<?= base_url() ?>admin/detail_penjualan/" class="btn btn-success btn-sm">
                            <i class="fa fa-desktop"></i> Detail
                          </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->