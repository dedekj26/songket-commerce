    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="<?= base_url() ?>user/home"><i class="fa fa-home"></i> Home</a>
                        <span>Browse</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Kategori</h4>
                        <ul class="filter-catagories">
                            <?php
                                foreach ($kategori as $kat) :
                            ?>

                            <li>
                                <a href="<?= base_url() ?>user/product/browse_kategori/<?= $kat['id_kategori'] ?>"><?= $kat['nama_kategori'] ?></a>
                            </li>

                            <?php
                                endforeach;
                            ?>
                            
                            <li>
                                <a href="<?= base_url() ?>user/product/browse">Semua Produk</a>
                            </li>
                        </ul>
                    </div>                
                </div>
                <div class="col-lg-9 order-1 order-lg-2">

                    <div class="product-list">
                        <div class="row">

                            <?php
                                foreach ($barang as $row) :
                            ?>

                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">

                                        <img    src="<?= base_url() ?>assets/img/barang/<?= $row['foto_barang']; ?>" 
                                                alt="Foto Barang"
                                                style=" height:295px; 
                                                width: 263px; 
                                                object-fit: cover; 
                                                object-position: center;
                                        ">

                                        <div class="sale pp-sale">Sale</div>
                                        <ul>
                                            <li class="w-icon active">
                                                <a href=""><i class="fa fa-shopping-cart"></i></a>
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
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->