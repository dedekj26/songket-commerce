    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="<?= base_url() ?>user/home"><i class="fa fa-home"></i> Home</a>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">

                        <?php
                            foreach ($detail_barang as $row) :
                        ?>

                        <div class="product-pic-zoom">
                            <img class="product-big-img" src="<?= base_url() ?>assets/img/barang/<?= $row['foto_barang']; ?>" alt="" />
                        </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>
                                        <?php
                                            foreach ($kategori as $kat) {
                                                if( $row['id_kategori'] ==  $kat['id_kategori'] )
                                                {
                                                echo $kat['nama_kategori'];
                                                }
                                            }
                                        ?>
                                    </span>
                                    <h3><?= $row['nama_barang']; ?></h3>
                                </div>
                                <div class="pd-desc">
                                    <p>
                                        <?= $row['deskripsi_barang']; ?>
                                    </p>
                                    <h4>Rp. <?= number_format($row['harga_barang']); ?></h4>
                                </div>
                                <div class="quantity">
                                    <a href="shopping-cart.html" class="primary-btn pd-cart">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            endforeach; 
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Produk Terkait</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                
                <?php
                    foreach ($barang_limit as $row) :
                ?>

                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img    src="<?= base_url() ?>assets/img/barang/<?= $row['foto_barang']; ?>"      alt=""
                                    style="height: 300px;" />
                            <ul>
                                <li class="w-icon active">
                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                </li>
                                <li class="quick-view">
                                    <a href="<?= base_url() ?>user/product/index/<?= $row['id_barang'] ?>">
                                        + Lihat Detail
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">
                                <?php
                                    foreach ($kategori as $kat) {
                                        if( $row['id_kategori'] ==  $kat['id_kategori'] )
                                        {
                                          echo $kat['nama_kategori'];
                                        }
                                    }
                                ?>
                            </div>
                            <a href="#">
                                <h5><?= $row['nama_barang']; ?></h5>
                            </a>
                            <div class="product-price">
                                Rp. <?= number_format($row['harga_barang']); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                    endforeach; 
                ?>

            </div>
        </div>
    </div>
    <!-- Related Products Section End -->