
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="<?= base_url() ?>assets/img/home_assets/hero/hero-songket-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Aksesoris Songket</span>
                            <h1>Diskon Ramadhan</h1>
                            <p>
                                Dapatkan diskon termurah selama Ramadhan hanya di Songket Cek Hj. Ipah HS, Hj. Cek Ila MS.
                            </p>
                            <a href="<?= base_url() ?>user/product/browse" class="primary-btn">Belanja Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="<?= base_url() ?>assets/img/home_assets/hero/hero-songket-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Batik Songket</span>
                            <h1>Diskon Ramadhan</h1>
                            <p>
                                Dapatkan diskon termurah selama Ramadhan hanya di Songket Cek Hj. Ipah HS, Hj. Cek Ila MS.
                            </p>
                            <a href="<?= base_url() ?>user/product/browse" class="primary-btn">Belanja Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <div class="product-slider owl-carousel">
                        
                        <?php
                            foreach ($barang as $row) :
                        ?>

                        <div class="product-item">
                            <div class="pi-pic">
                                <img    src="<?= base_url() ?>assets/img/barang/<?= $row['foto_barang']; ?>" 
                                        alt="Foto Barang"
                                        style=" height:400px; 
                                                width: 100px; 
                                                object-fit: cover; 
                                                object-position: center;
                                        "/>
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

                        <?php
                            endforeach; 
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Deal Of The Week Section Begin-->
    <section class="deal-of-week set-bg spad mb-5" data-setbg="<?= base_url() ?>assets/img/home_assets/promo/time-bg.jpg">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Penawaran Mingguan</h2>
                    <p>Dapatkan Diskon spesial hingga <b>50%</b> hanya minggu ini!</p>
                    <div class="product-price">
                        <s><small>Rp. 150.000</small></s> <b>Rp.75.000</b> 
                        <span>/ Kain 2m</span>
                    </div>
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>56</span>
                        <p>Hari</p>
                    </div>
                    <div class="cd-item">
                        <span>12</span>
                        <p>Jam</p>
                    </div>
                    <div class="cd-item">
                        <span>40</span>
                        <p>Menit</p>
                    </div>
                    <div class="cd-item">
                        <span>52</span>
                        <p>Detik</p>
                    </div>
                </div>
                <a href="<?= base_url() ?>user/product/browse" class="primary-btn">Belanja Sekarang</a>
            </div>
        </div>
    </section>
    <!-- Deal Of The Week Section End -->

    <!-- Instagram Section Begin -->
    <div class="instagram-photo">
        <div class="insta-item set-bg mt-5" data-setbg="<?= base_url() ?>assets/img/home_assets/insta/insta-songket-1.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">songket_cek_ipah</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg mt-5" data-setbg="<?= base_url() ?>assets/img/home_assets/insta/insta-songket-2.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">songket_cek_ipah</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg mt-5" data-setbg="<?= base_url() ?>assets/img/home_assets/insta/insta-songket-3.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">songket_cek_ipah</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg mt-5" data-setbg="<?= base_url() ?>assets/img/home_assets/insta/insta-songket-4.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">songket_cek_ipah</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg mt-5" data-setbg="<?= base_url() ?>assets/img/home_assets/insta/insta-songket-5.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">songket_cek_ipah</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg mt-5" data-setbg="<?= base_url() ?>assets/img/home_assets/insta/insta-songket-6.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">songket_cek_ipah</a></h5>
            </div>
        </div>
    </div>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Kenapa Memilih Kami</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img class="rounded" src="<?= base_url() ?>assets/img/home_assets/review/latest-1.jpg" alt="">
                        <div class="latest-text text-center">
                            <a href="#" class="mb-2">
                                <h6><strong>Selena Gomez</strong></h6>
                            </a>
                            <blockquote class="blockquote">
                                <p class=""><em>" Pelayanan memuaskan! seller ramah dan pengiriman cepat. "</em></p>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="<?= base_url() ?>assets/img/home_assets/review/latest-2.jpg" class="rounded" alt="">
                        <div class="latest-text text-center">
                            <a href="#" class="mb-2">
                                <h6><strong>Latifa</strong></h6>
                            </a>
                            <blockquote class="blockquote">
                                <p class=""><em>" Pembayaran aman! jaminan refund jika barang tidak memuaskan. "</em></p>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="<?= base_url() ?>assets/img/home_assets/review/latest-3.jpg" class="rounded" alt="">
                        <div class="latest-text text-center">
                            <a href="#" class="mb-2">
                                <h6><strong>Brisia Jodi</strong></h6>
                            </a>
                            <blockquote class="blockquote">
                                <p class=""><em>" Mantap! selalu dapat Gratis Ongkir. "</em></p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>

            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="<?= base_url() ?>assets/img/home_assets/icon/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Gratis Ongkir</h6>
                                <p>Selama Ramadhan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="<?= base_url() ?>assets/img/home_assets/icon/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Tepat Waktu</h6>
                                <p>Barang dikirim langsung</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="<?= base_url() ?>assets/img/home_assets/icon/icon-3.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Pembayaran Aman</h6>
                                <p>Garansi Uang Kembali</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?= base_url() ?>assets/img/home_assets/logo-carousel/logo-1.png" alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?= base_url() ?>assets/img/home_assets/logo-carousel/logo-2.png" alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?= base_url() ?>assets/img/home_assets/logo-carousel/logo-3.png" alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?= base_url() ?>assets/img/home_assets/logo-carousel/logo-4.png" alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="<?= base_url() ?>assets/img/home_assets/logo-carousel/logo-5.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->