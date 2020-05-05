    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a>
                        <span>Keranjang Belanja</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">

            <?php
                if($jumlah_ongkir == 0 | $jumlah_ongkir == NULL) :
            ?>
                <div class="alert alert-warning" role="alert">
                    Sebelum melakukan chekout, harap pilih kurir dan melakukan cek ongkir.
                </div>
            <?php
                endif;
            ?>

            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Gambar</th>
                                            <th class="p-name text-center">Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            foreach ($keranjang as $key) :
                                        ?>

                                        <tr>
                                            <td class="cart-pic first-row">
                                                <img src="<?= base_url() ?>assets/img/barang/<?= $key['photo'] ?>" />
                                            </td>
                                            <td class="cart-title first-row text-center">
                                                <h5><?= $key['name'] ?> x <?= $key['qty'] ?></h5>
                                            </td>
                                            <td class="p-price first-row">Rp. <?= number_format($key['price']) ?></td>
                                            <td class="delete-item">
                                                <button type="button" 
                                                        id="<?= $key['rowid'] ?>"
                                                        class="hapus_cart btn btn-borderless">
                                                <i class="material-icons">
                                                    close
                                                </i>
                                                </button>
                                            </td>
                                        </tr>

                                        <?php
                                            endforeach;
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="col-lg-8">
                            <h4 class="mb-4">
                                Informasi Pembeli:
                            </h4>
                            <div class="user-checkout">
                                <form action="<?= base_url() ?>user/cart/checkout" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="namaLengkap">Nama lengkap</label>
                                        <input  type="text" 
                                                class="form-control" 
                                                name="nama_pelanggan" 
                                                aria-describedby="namaHelp" 
                                                placeholder="Masukan Nama" 
                                                <?php
                                                    if($jumlah_ongkir == 0 | $jumlah_ongkir == NULL){
                                                        echo "disabled";
                                                    }
                                                    else{
                                                        echo "required";   
                                                    }
                                                ?>>
                                    </div>

                                    <div class="form-group">
                                        <label for="namaLengkap">Email Address</label>
                                        <input  type="email" 
                                                class="form-control" 
                                                name="email_pelanggan"
                                                aria-describedby="emailHelp" 
                                                placeholder="Masukan Email"
                                                <?php
                                                    if($jumlah_ongkir == 0 | $jumlah_ongkir == NULL){
                                                        echo "disabled";
                                                    }
                                                    else{
                                                        echo "required";   
                                                    }
                                                ?>>
                                    </div>

                                    <div class="form-group">
                                        <label for="namaLengkap">No. HP</label>
                                        <input  type="text" 
                                                class="form-control" 
                                                name="nomor_pelanggan"
                                                aria-describedby="noHPHelp" 
                                                placeholder="Masukan No. HP"
                                                <?php
                                                    if($jumlah_ongkir == 0 | $jumlah_ongkir == NULL){
                                                        echo "disabled";
                                                    }
                                                    else{
                                                        echo "required";   
                                                    }
                                                ?>>
                                    </div>

                                    <div class="form-group">
                                        <label for="bukti_transfer">Bukti Transfer</label>
                                        <input  type="file" 
                                                class="form-control"
                                                name="bukti_transfer"
                                                aria-describedby="BuktiTransfer" 
                                                placeholder="Tambahkan Bukti Transfer"
                                                <?php
                                                    if($jumlah_ongkir == 0 | $jumlah_ongkir == NULL){
                                                        echo "disabled";
                                                    }
                                                    else{
                                                        echo "required";   
                                                    }
                                                ?>>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamatLengkap">Alamat Lengkap</label>
                                        <textarea   class="form-control" 
                                                    name="alamat_pelanggan"
                                                    rows="3" 
                                                    <?php
                                                    if($jumlah_ongkir == 0 | $jumlah_ongkir == NULL){
                                                        echo "disabled";
                                                    }
                                                    else{
                                                        echo "required";   
                                                    }
                                                    ?>></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="proceed-checkout">
                                <ul>
                                    <?php $kode_transaksi = 'SKT'.rand(00000000, 99999999); ?>
                                    <input type="hidden" name="kode_transaksi" value="<?= $kode_transaksi ?>">

                                    <li class="subtotal">ID Transaction <span><?= $kode_transaksi ?></span></li>

                                    <li class="subtotal mt-3">Subtotal 
                                        <span>Rp. <?= number_format($this->cart->total()) ?></span>
                                    </li>

                                    <li class="subtotal mt-3">Ongkir
                                        <?php 
                                        
                                        if($jumlah_ongkir == 0 | $jumlah_ongkir == NULL){
                                            $ongkir = 0;
                                        }
                                        else{
                                            foreach ($jumlah_ongkir['rajaongkir']['results'][0]['costs'] as $value) {
                                                foreach ($value['cost'] as $tarif) {
                                                    $ongkir = $tarif['value'];
                                                }
                                            }
                                        }

                                        ?>
                                        <span>Rp. <?= number_format($ongkir) ?></span>
                                    </li>

                                    <li class="subtotal mt-3">Total Biaya
                                        <span>Rp. <?php 
                                            $total_bayar = $this->cart->total() + $ongkir; 
                                            echo number_format($total_bayar); ?></span>
                                        <input type="hidden" name="total_bayar" value="<?= $total_bayar ?>">
                                    </li>

                                    <li class="subtotal mt-3">Bank Transfer <span>Mandiri</span></li>
                                    <li class="subtotal mt-3">No. Rekening <span>2208 1996 1403</span></li>
                                    <li class="subtotal mt-3">Nama Penerima <span>Songket Cek Ipah</span></li>
                                </ul>
                                <p class="proceed-btn d-flex justify-content-center">
                                    <button     type="submit" 
                                                class="proceed-btn"
                                                <?php   if($ongkir == 0){
                                                            echo "disabled";
                                                        } 
                                                ?>
                                    >I ALREADY PAID</button>
                                </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <h4 class="mb-4 mt-5">
                        Pengecekan Ongkir :
                    </h4>
                    <form action="<?= base_url() ?>user/product/cek_ongkir" method="POST">
                        <div class="form-group">
                            <label for="kota_tujuan">Kota Tujuan</label>       
                                <select class="form-control" id="sel11" name="kota" required="">
                                    <?php
                                        for ($i=0; $i < count($kota['rajaongkir']['results']); $i++){ 
                                            echo "<option value='".$kota['rajaongkir']['results'][$i]['city_id']."'>".$kota['rajaongkir']['results'][$i]['city_name']."</option>";
                                        }
                                    ?>
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="kurir">Kurir</label>       
                                <select class="form-control" id="kurir" name="kurir">
                                    <option value="jne">JNE</option>
                                    <option value="tiki">TIKI</option>
                                    <option value="pos">POS INDONESIA</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">Cek Ongkir</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->