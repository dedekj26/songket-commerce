
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
                    <button type="submit" class="btn btn-primary">Atur</button>
                </div>
              </form>

              <div class="table-responsive">
                <table class="table table-bordered dt-responsive nowrap" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Penjualan</th>
                      <th>Barang</th>
                      <th>Total Harga</th>
                      <th>Tanggal Penjualan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>BS001</td>
                      <td>
                        <span class="nama-barang">Baju Songket</span>
                        <span class="jumlah-barang">x 4</span>
                      </td>
                      <td>Rp. 520.000</td>
                      <td>12 Februari 2020</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>KS002</td>
                      <td>
                        <span class="nama-barang">Kain Songket 3m</span>
                        <span class="jumlah-barang">x 2</span>
                      </td>
                      <td>Rp. 120.000</td>
                      <td>14 Februari 2020</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->