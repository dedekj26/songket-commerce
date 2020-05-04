    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="<?= base_url() ?>assets/img/home_assets/logo/logo_website_songket_white.png" alt="" /></a>
                        </div>
                        <ul>
                            <li>Alamat : Jl. Ki Rangga Wirasantika No. 151, 30 ilir, Palembang</li>
                            <li>Telepon : +628 22-8197-0028</li>
                            <li>Email : songket.cekipah@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="www.facebook.com"><i class="fa fa-facebook"></i></a>
                            <a href="www.instagram.com"><i class="fa fa-instagram"></i></a>
                            <a href="www.twitter.com"><i class="fa fa-twitter"></i></a>
                            <a href="www.pinterest.com"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Informasi</h5>
                        <ul>
                            <li><a href="#">Tentang Kami</a></li>
                            <li><a href="#">Pembayaran</a></li>
                            <li><a href="#">Kontak</a></li>
                            <li><a href="#">Layanan</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h5>Akun Saya</h5>
                        <ul>
                            <li><a href="<?= base_url() ?>auth">Admin</a></li>
                            <li><a href="#">Keranjang Belanja</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | Kelompok Songket Cek Ipah HS, Cek Ila MS
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="<?= base_url() ?>assets/vendor/front-end/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/front-end/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/front-end/js/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/front-end/js/jquery.countdown.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/front-end/js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/front-end/js/jquery.zoom.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/front-end/js/jquery.dd.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/front-end/js/jquery.slicknav.js"></script>
    <script src="<?= base_url() ?>assets/vendor/front-end/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/front-end/js/main.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.add_cart').click(function(){
                var produk_id    = $(this).data("produkid");
                var produk_nama  = $(this).data("produknama");
                var produk_harga = $(this).data("produkharga");
                var produk_foto = $(this).data("produkfoto");
                $.ajax({
                    url : "<?php echo base_url();?>user/cart",
                    method : "POST",
                    data : {produk_id: produk_id, produk_nama: produk_nama, produk_harga: produk_harga, produk_qty: 1, produk_foto: produk_foto},
                    success: function(data){
                        location.reload();
                    }
                });
            });
     
            //Hapus Item Cart
            $(document).on('click','.hapus_cart',function(){
                var row_id=$(this).attr("id");
                $.ajax({
                    url : "<?php echo base_url();?>user/cart/delete_cart",
                    method : "POST",
                    data : {row_id : row_id},
                    success :function(data){
                        location.reload();
                    }
                });
            });
        });
    </script>

</body>

</html>