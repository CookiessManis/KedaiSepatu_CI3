<nav class="navbar sticky-top navbar-expand-md navbar-light bg-primary navbar-white shadow-lg">
    <div class="container-fluid px-4">
        <a href="<?= base_url('home') ?>" class="navbar-brand">
            <i class="fas fa-store font-light text-light"></i>
            <span class="brand-text font-weight-light text-light">Kedai Sepatu</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <?php $kategori = $this->M_barang->get_all_data_kategori() ?>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-light">Kategori</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <?php foreach ($kategori as $key => $value) { ?>
                            <li><a href="<?= base_url('home/kategori/' . $value->id_kategori) ?>" class="dropdown-item"><?= $value->nama_kategori ?></a></li>

                        <?php } ?>
                        <!-- End Level two -->
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav">

                <a href="<?= base_url('home')?>"><li class="nav-link text-light">
                    Home
                </li></a>
            </ul>


        </div>
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">


            <!-- Messages Dropdown Menu -->

            </li>
            <?php
            //menampilkan jumlah cart pada notification
            $keranjang = $this->cart->contents();
            $jml_item = 0;
            foreach ($keranjang as $key => $value) {
                $jml_item = $jml_item + $value['qty'];
            }
            ?>

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-shopping-cart text-light"></i>
                    <span class="badge badge-danger navbar-badge"><?= $jml_item ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <?php if (empty($keranjang)) { ?>
                        <a href="#" class="dropdown-item">
                            <p>Keranjang Belanja Kosong</p>
                        </a>
                        <?php } else {

                        foreach ($keranjang as $key => $value) {
                            $barang = $this->M_barang->detail_barang($value['id']);
                        ?>


                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="<?php echo base_url('assets/gambar/' . $barang->gambar) ?>" alt="User Avatar" class="img-size-50 mr-3 ">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            <?= $value['name'] ?>

                                        </h3>
                                        <p class="text-sm"><?= $value['qty'] ?> x Rp.<?= number_format($value['price'], 0) ?></p>
                                        <p class="text-sm text-muted"><i class="fa fa-file-invoice-dollar"></i>
                                            <b>
                                                <?php echo $this->cart->format_number($value['subtotal']); ?>
                                            </b>

                                        </p>
                                    </div>
                                </div>
                                <!-- Message End -->

                            </a>
                            <div class="dropdown-divider"></div>
                        <?php } ?>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">

                                <div class="media-body">
                                    <tr>
                                        <td colspan="2"> </td>
                                        <td class="right"><strong>Total:</strong></td>
                                        <td class="right">Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                                    </tr>
                                </div>
                            </div>
                            <!-- Message End -->

                        </a>

                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('belanja') ?>" class="dropdown-item dropdown-footer">Tampilkan Keranjang Belanja</a>
                    <?php } ?>


            <li class="nav-item">
                <?php if ($this->session->userdata('email') == "") { ?>
                    <a class="nav-link" href="<?= base_url('pelanggan/login') ?>">
                        <img src="<?php echo base_url() ?>assets/foto/no_profile.png" width="30" height="30" class="brand-image img-circle elevation-3" style="opacity: .8">
                    </a>


                <?php } else { ?>
            <li class="nav-item dropdown">

                <a class="nav-link" data-toggle="dropdown" href="#">
                    <span class="brand-text font-weight-light text-light"><?= $pelanggan['nama_pelanggan'] ?></span>
                    <img src="<?php echo base_url('assets/foto/' . $this->session->userdata('gambar')) ?>" width="30" height="30" class="brand-image img-circle elevation-3" style="opacity: .8">

                </a>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url('pelanggan/akun') ?>" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Akun Saya
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url('pesanan_saya') ?>" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> Pesanan Saya

                    </a>


                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url('pelanggan/logout') ?>" class="dropdown-item dropdown-footer">Log Out</a>
                </div>
            <?php } ?>



    </div>
    </li>
    <!-- Notifications Dropdown Menu -->


    </ul>
    </div>
</nav>