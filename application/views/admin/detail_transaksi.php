<?php
    foreach ($transaksi as $row) :
?>

<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td><?= $row['nama_pelanggan']; ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?= $row['email_pelanggan']; ?></td>
    </tr>
    <tr>
        <th>Nomor</th>
        <td><?= $row['nomor_pelanggan']; ?></td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td><?= $row['alamat_pelanggan']; ?></td>
    </tr>
    <tr>
        <th>Total Transaksi</th>
        <td>Rp. <?= number_format($row['total_bayar']); ?> (termasuk ongkir)</td>
    </tr>
    <tr>
        <th>Status Transaksi</th>
        <td><?= $row['status_transaksi']; ?></td>
    </tr>
    <tr>
        <th>Pembelian Product</th>
        <td>
            <table class="table table-bordered w-100">

                <tr>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                </tr>
                
                <?php
                    foreach ($transaksi_barang as $trans) :
                        foreach ($barang as $prod) {
                            if( $trans['id_barang'] == $prod['id_barang']  ){
                ?>
                                <tr>
                                    <td><?= $prod['nama_barang'] ?></td>
                                    
                                    <?php
                                    foreach ($kategori as $kat) :
                                        if($prod['id_kategori'] == $kat['id_kategori']){
                                    ?>
                                        <td><?= $kat['nama_kategori'] ?></td>
                                    <?php
                                        }
                                    endforeach;
                                    ?>

                                    <td>Rp. <?= number_format($prod['harga_barang']) ?></td>
                                </tr>
                <?php
                            }
                        }
                  endforeach; 
                ?>

            </table>
        </td>
    </tr>
    
    <?php 
        if($row['status_transaksi'] == 'PENDING'){
    ?>
    <tr>
        <th colspan="2" class="text-center">BUKTI TRANSFER</th>
    </tr>
    <tr>
        <td colspan="2" class="text-center">
            <img src="<?= base_url() ?>/assets/img/bukti_transfer/<?= $row['bukti_transfer'] ?>" width="400px" alt="">
        </td>
    </tr>
    <?php
        } 
    ?>
        
</table>

<div class="row">

    <div class="col-4">
        <a href="<?= base_url() ?>admin/transaksi/ubah_transaksi/<?= $row['id_transaksi'] ?>/SUCCESS" class="btn btn-success btn-block">
            <i class="fa fa-check"></i> Set Sukses
        </a>
    </div>

    <div class="col-4">
        <a href="<?= base_url() ?>admin/transaksi/ubah_transaksi/<?= $row['id_transaksi'] ?>/FAILED" class="btn btn-warning btn-block">
            <i class="fa fa-times"></i> Set Gagal
        </a>
    </div>

    <div class="col-4">
        <a href="<?= base_url() ?>admin/transaksi/ubah_transaksi/<?= $row['id_transaksi'] ?>/PENDING" class="btn btn-info btn-block">
            <i class="fa fa-spinner"></i> Set Pending
        </a>
    </div>

</div>

<?php
  endforeach; 
?>