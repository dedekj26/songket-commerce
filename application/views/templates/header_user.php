<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Shayna Template" />
    <meta name="keywords" content="Shayna, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Songket | Home</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/front-end/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/front-end/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/front-end/css/themify-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/front-end/css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/front-end/css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/front-end/css/nice-select.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/front-end/css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/front-end/css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/front-end/css/style.css" type="text/css" />
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="<?= base_url() ?>user/home">
                                <img src="<?= base_url() ?>assets/img/home_assets/logo/logo_website_songket.png" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7"></div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="cart-icon">
                                <a href="#">
                                    Keranjang Belanja <i class="fa fa-shopping-cart"></i>
                                    <span><?= $this->cart->total_items() ?></span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                
                                                <?php
                                                    foreach ($keranjang as $key) :
                                                ?>

                                                <tr>
                                                    <td class="si-pic">
                                                        <img    src="<?= base_url() ?>assets/img/barang/<?= $key['photo'] ?>" 
                                                                alt="foto"
                                                                height="50"
                                                                width="50" />
                                                    </td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>Rp. <?= number_format($key['price']) ?> x <?= $key['qty'] ?></p>
                                                            <h6><?= $key['name'] ?></h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <button type="button" 
                                                                id="<?= $key['rowid'] ?>"
                                                                class="hapus_cart btn btn-borderless">
                                                            <i class="ti-close"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                
                                                <?php
                                                    endforeach;
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>Rp. <?= number_format($this->cart->total()) ?></h5>
                                    </div>

                                    <div class="select-button">
                                        <a href="#" class="primary-btn view-card">LIHAT KERANJANG</a>
                                        <a href="#" class="primary-btn checkout-btn">BAYAR</a>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->