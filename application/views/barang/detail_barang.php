<div class="px-4">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('home')?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">


        <div class="card card-solid">
            <div class="card-body">
                <div class="row">

                    <div class="col-12 col-sm-6 shadow-md">
                        <h3 class="d-inline-block d-sm-none"><?= $barang->nama_barang ?></h3>
                        <div class="col-12 xzoom-container">
                            <img src="<?= base_url('assets/gambar/' . $barang->gambar) ?>" class="product-image xzoom" id="xzoom-default" xoriginal="<?= base_url('assets/gambar/' . $barang->gambar) ?>">
                        </div>
                        <div class="col-12 xzoom-thumbs product-image-thumbs">
                            <div class="xzoom-thumbs product-image-thumb ">
                                <a href="<?= base_url('assets/gambar/' . $barang->gambar) ?>">
                                    <img src="<?= base_url('assets/gambar/' . $barang->gambar) ?>" alt="Product Image" class="xzoom-gallery" xpreview="<?= base_url('assets/gambar/' . $barang->gambar) ?>">
                                </a>

                            </div>
                            <?php foreach ($gambar as $key => $value) { ?>
                                <div class="xzoom-thumbs product-image-thumb">
                                    <a href="<?= base_url('assets/gambar_barang/' . $value->gambar) ?>">
                                        <img src="<?= base_url('assets/gambar_barang/' . $value->gambar) ?>" alt="Product Image" class="xzoom-gallery" xpreview="<?= base_url('assets/gambar_barang/' . $value->gambar) ?>">
                                    </a>
                                </div>

                            <?php } ?>


                        </div>
                    </div>
                    <div class="col-12 col-sm-6">


                        <div class="bg-white  py-2 px-3 mt-4 rounded-lg px-4 shadow-lg">
                            <h2 class="my-2"><?= $barang->nama_barang ?></h2>
                            <h5 class="mb-4 font-weight-lighter"><?= $barang->nama_kategori ?></h5>
                            <h4 class=""><?= $barang->deskripsi ?></h4>

                            <hr>
                            <h4 class="mb-0">
                                Stok : <?= $barang->stok ?>
                            </h4>
                            <h4 class="mt-0">
                                Berat : <?= $barang->berat ?>
                            </h4>
                            
                            
                                <h2 class="mb-0">
                                    Price
                                </h2>
                                <h4 class="mt-0">
                                    <small>Rp. <?= number_format($barang->harga, 0)  ?> </small>
                                </h4>
                        </div>
                            <hr>
                        <?php
                        echo form_open('belanja/add');
                        echo form_hidden('id', $barang->id_barang);
                        echo form_hidden('price', $barang->harga);
                        echo form_hidden('name', $barang->nama_barang);
                        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                        ?>

                        <div class="col-sm-2">
                            <input type="number" name="qty" class="form-control" value="1" min="1">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary btn-lg btn-flat swalDefaultSuccess">
                                <i class="fas fa-cart-plus">
                                    Add to cart
                                </i>
                            </button>


                        </div>

                    </div>
                    <?= form_close() ?>


                </div>
            </div>
        </div>
    </div>

</div>

<!-- jQuery -->
<!-- jQuery -->
<script src="<?= base_url('assets/') ?>jquery/jquery-3.4.1.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script>
    $(document).ready(function() {
        $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 500,
            title: false,
            tint: '#333',
            Xoffset: 20,
            smoothLensMove: 5,
        });
    });
</script>