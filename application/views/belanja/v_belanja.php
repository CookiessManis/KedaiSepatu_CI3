    <!-- Main content -->
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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">

                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <?php echo form_open('belanja/update'); ?>
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>QTY</th>
                                                    <th>Nama Barang</th>
                                                    <th>Harga</th>
                                                    <th>Berat</th>
                                                    <th>Sub-total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $i = 1; ?>

                                            <?php

                                            $total_berat = 0;
                                            foreach ($this->cart->contents() as $items) {
                                                $barang = $this->M_barang->detail_barang($items['id']);
                                                $berat = $items['qty'] * $barang->berat;
                                                $total_berat = $total_berat + $berat;

                                            ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td class="col-1"><?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'min' => '0', 'size' => '5', 'type' => 'number', 'class' => 'form-control')); ?>
                                                        </td>
                                                        <td><?= $items['name']; ?>
                                                        </td>
                                                        <td>Rp.<?= number_format($items['price']) ?></td>
                                                        <td> <?= $berat ?> Gr</td>
                                                        <td>Rp.<?= number_format($items['subtotal']) ?></td>
                                                        <td class="px-4">
                                                            <a href="<?= base_url('belanja/delete/' . $items['rowid']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                            <button type="submit" class="btn btn-warning btn-sm">
                                                                <i class="fas fa-pen"></i>
                                                            </button>
                                                        </td>


                                                    </tr>

                                                    <?php $i++ ?>
                                                <?php } ?>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>QTY</th>
                                                        <th>Nama Barang</th>
                                                        <th>Harga</th>
                                                        <th>Berat</th>
                                                        <th>Sub-total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                                <?php echo form_close() ?>
                                        </table>
                                        <div class="px-4 text-right mb-4">
                                            <tr>
                                                <td class="left"><strong>Total</strong></td>
                                                <td class="left"><strong>Rp. <?php echo number_format($this->cart->total(), 0); ?></strong></td>
                                            </tr>
                                        </div>
                                        <div class="px-4 text-right">

                                            <tr>

                                                <td>
                                                    <a href="<?= base_url('home') ?>" class="btn btn-dark btn-sm"><i class="fa fa-chevron-left"></i>Kembali Ke Halaman</a>
                                                    <a href="<?= base_url('belanja/cekout') ?>" class="btn btn-success btn-sm"> <i class="fas fa-shopping-cart"></i>Check Out</a>

                                                </td>

                                            </tr>

                                        </div>
                                        <hr>

                                    </div>

                                    <!-- /.card-body -->
                                </div>

                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>