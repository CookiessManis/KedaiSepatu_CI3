<div class="px-4">


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#belumbayar" data-toggle="tab">Belum Bayar</a></li>
                                <li class="nav-item"><a class="nav-link" href="#pesanandiproses" data-toggle="tab">Pesanan Diproses</a></li>
                                <li class="nav-item"><a class="nav-link" href="#pesanandikirim" data-toggle="tab">Pesanan Dikirim</a></li>
                                <li class="nav-item"><a class="nav-link" href="#pesananselesai" data-toggle="tab">Pesanan Selesai</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="belumbayar">
                                    <table class="table">
                                        <tr>
                                            <th>Invoice</th>
                                            <th>Tanggal</th>
                                            <th>Expedisi</th>
                                            <th>Total Bayar</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php foreach ($belum_bayar as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td>
                                                    <b><?= $value->expedisi ?></b><br>
                                                    Paket : <?= $value->paket ?><br>
                                                    Estimasi : <?= $value->estimasi ?><br>
                                                    Ongkir : Rp.<?= number_format($value->ongkir) ?>
                                                </td>

                                                <td>Rp.<?= number_format($value->grand_total, 0) ?><br>
                                                    <?php if ($value->status_bayar == 0) { ?>
                                                        <span class="badge badge-danger">Belum Bayar</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-primary">Sudah Bayar</span> <br>
                                                        <span class="badge badge-warning">Menunggu Verifikasi</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($value->status_bayar == 0) { ?>
                                                        <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-warning">Bayar</a>
                                                    <?php } ?>


                                                </td>


                                            </tr>
                                        <?php } ?>

                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="pesanandiproses">
                                    <table class="table">
                                        <tr>
                                            <th>No Order</th>
                                            <th>Tanggal</th>
                                            <th>Expedisi</th>
                                            <th>Total Bayar</th>
                                        </tr>
                                        <?php foreach ($proses as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td>
                                                    <b><?= $value->expedisi ?></b><br>
                                                    Paket : <?= $value->paket ?><br>
                                                    Estimasi : <?= $value->estimasi ?><br>
                                                    Ongkir : Rp.<?= number_format($value->ongkir) ?>
                                                </td>

                                                <td>Rp.<?= number_format($value->grand_total, 0) ?><br>

                                                    <span class="badge badge-primary">Pesanan Diproses</span> <br>
                                                    <span class="badge badge-warning">Menunggu pihak penjual Mengirim Barang!</span>

                                                </td>
                                                <td>



                                                </td>


                                            </tr>
                                        <?php } ?>

                                    </table>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="pesanandikirim">
                                    <table class="table">
                                        <tr>
                                            <th>No Order</th>
                                            <th>Tanggal</th>
                                            <th>Expedisi</th>
                                            <th>Total Bayar</th>
                                            <th>No Resi</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php foreach ($kirim as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td>
                                                    <b><?= $value->expedisi ?></b><br>
                                                    Paket : <?= $value->paket ?><br>
                                                    Estimasi : <?= $value->estimasi ?><br>
                                                    Ongkir : Rp.<?= number_format($value->ongkir) ?>
                                                </td>

                                                <td>Rp.<?= number_format($value->grand_total, 0) ?><br>

                                                    <span class="badge badge-primary">Dikirim
                                                    </span>
                                                </td>
                                                <td>
                                                    <?= $value->no_resi ?><br>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#diterima<?= $value->id_transaksi ?>">Diterima</button>

                                                </td>

                                            </tr>
                                        <?php } ?>

                                    </table>
                                </div>

                                <div class="tab-pane" id="pesananselesai">
                                    <table class="table">
                                        <tr>
                                            <th>No Order</th>
                                            <th>Tanggal</th>
                                            <th>Expedisi</th>
                                            <th>Total Bayar</th>
                                            <th>No Resi</th>
                                        </tr>
                                        <?php foreach ($selesai as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->no_order ?></td>
                                                <td><?= $value->tgl_order ?></td>
                                                <td>
                                                    <b><?= $value->expedisi ?></b><br>
                                                    Paket : <?= $value->paket ?><br>
                                                    Estimasi : <?= $value->estimasi ?><br>
                                                    Ongkir : Rp.<?= number_format($value->ongkir) ?>
                                                </td>

                                                <td>Rp.<?= number_format($value->grand_total, 0) ?><br>

                                                    <span class="badge badge-primary">Pesanan Selesai
                                                    </span>
                                                <td><?= $value->no_resi ?><br>

                                                </td>



                                            </tr>
                                        <?php } ?>

                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
</div>
</section>
</div>
<?php foreach ($kirim as $key => $value) { ?>
    <!-- Modal Alert pada tombol diterima -->
    <div class="modal fade" id="diterima<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesanan Diterima</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3>Apakah Pesanan Sudah Diterima?</h3>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Belum</button>
                    <a href="<?= base_url('pesanan_saya/diterima/' . $value->id_transaksi) ?>" class="btn btn-primary">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>