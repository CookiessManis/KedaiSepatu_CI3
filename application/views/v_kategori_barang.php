<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                    <li class="breadcrumb-item active"><?= $title ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid px-4 mt-4">

    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?= base_url('assets/img/olshop.jpg') ?>">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= base_url('assets/img/mm.png') ?>">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= base_url('assets/img/NIKE-SLIDER.jpg') ?>">
            </div>
        </div>

    </div>
</div>



<!-- Begin Page Content -->
<div class="px-4 " style="background-color: #F8F4F4;">

    <!-- Page Heading -->







    <br>

    <div class="form-group">
        <?= form_open('home/search') ?>
        <div class="input-group input-group-lg">
            <input type="text" name="search" class="form-control form-control-lg" placeholder="Type your Shoes here">
            <div class="input-group-append">
                <button type="submit" class="btn btn-lg btn-default">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        <?= form_close() ?>
    </div>







    <!-- Content Row -->
    <div class="row">
        <?php if (empty($barang)) { ?>
            <!-- Content Wrapper. Contains page content -->
            <section class="content mx-auto">
                <div class="error-page">
                    <h2 class="headline text-danger">500</h2>

                    <div class="error-content">
                        <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Barang Belum Ditambahkan.</h3>

                        <p>

                            Mohon untuk memilih kategori yang lain atau <a href="<?= base_url('home') ?>">Kembali ke dashboard</a>
                        </p>


                    </div>
                </div>
                <!-- /.error-page -->

            </section>
            <!-- /.content -->
            <!-- /.content -->

            <?php } else {
            foreach ($barang as $key => $value) { ?>


                <div class="col-lg-auto mb-4">
                    <?php
                    echo form_open('belanja/add');
                    echo form_hidden('id', $value->id_barang);
                    echo form_hidden('qty', 1);
                    echo form_hidden('price', $value->harga);
                    echo form_hidden('name', $value->nama_barang);
                    ?>
                    <!-- Earnings (Monthly) Card Example -->

                    <?php
                    if ($value->stok == "0") { ?>

                    <?php } else { ?>
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <img class="img-fluid px-4 px-sm-4 mt-3 mb-4" style="width: 20rem;" src="<?= base_url('assets/gambar/' . $value->gambar) ?>" alt="...">
                                </div>
                                <p class="font-font-weight-light text-default mb-2"><?= $value->nama_kategori ?></p>
                                <h4 class="m-0 font-weight-bold text-dark mb-4"><?= $value->nama_barang ?></h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="text-left">
                                            <p class=" font-weight text-gray-800 ">Price: <br>
                                                <span class="text-primary  text-lg">Rp. <?= number_format($value->harga, 0) ?> </span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="text-right">
                                            <a class="badge badge-danger rounded-circle disabled"><?= $value->stok ?></a>
                                            <a href="<?= base_url('home/detail_barang/' . $value->id_barang) ?>" class="btn btn-sm btn-primary rounded-lg">
                                                Lihat Detail
                                            </a>
                                            <button type="submit" class="btn btn-sm btn-warning rounded-sm">
                                                <i class="fas fa-shopping-cart"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?= form_close(); ?>
                </div>

                <!-- Earnings (Monthly) Card Example -->
            <?php } ?>
        <?php } ?>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->

<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->



<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Keranjang Berhasil Di tambahkan'
            })
        });
    });
</script>