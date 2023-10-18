<div class="container-fluid">


    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">


        <div class="col-lg-6">


            <!-- Mencari Laporan berdasarkan Bulan -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Bulanan</h6>
                </div>
                <div class="card-body">
                    <?php echo form_open('laporan/laporan_bulanan') ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label> bulan </label>
                                <select name="bulan" class="form-control">
                                    <?php
                                    $start = 1;
                                    for ($i = $start; $i < $start + 12; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label> tahun </label>
                                <select name="tahun" class="form-control">
                                    <?php
                                    $start = date('Y') - 1;
                                    for ($i = $start; $i < $start + 5; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Cetak Laporan</button>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>

        </div>
        <div class="col-lg-6">



            <!-- Mencari Laporan berdasarkan Tahunan -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Tahunan</h6>
                </div>
                <div class="card-body">
                    <?php echo form_open('laporan/laporan_tahunan') ?>
                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label> tahun </label>
                                <select name="tahun" class="form-control">
                                    <?php
                                    $start = date('Y') - 1;
                                    for ($i = $start; $i < $start + 5; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Cetak Laporan</button>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>

                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="form-group">
            <?= form_open('laporan/search') ?>
            <div class="input-group input-group-lg">
                <input type="text" name="search" class="form-control form-control-lg" placeholder="Masukkan Kata Kunci Menggunakan Tanggal">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            <?= form_close() ?>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>

                                    <tr>
                                        <th>No</th>
                                        <th>Invoice</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Tanggal</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Satuan</th>
                                        <th>qty</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <div class="card-body">
                                    <?php $no = 1;
                                    $total_keseluruhan = 0;
                                    foreach ($laporan as $key => $value) {
                                        $total_harga = $value->qty * $value->harga;
                                        $total_keseluruhan = $total_keseluruhan + $total_harga;
                                    ?>


                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->no_order ?></td>
                                            <td><?= $value->nama_pelanggan ?></td>
                                            <td><?= $value->tgl_order ?></td>
                                            <td><?= $value->nama_barang ?></td>
                                            <td>Rp.<?= number_format($value->harga, 0) ?></td>
                                            <td><?= $value->qty ?></td>
                                            <td>Rp.<?= number_format($total_harga, 0) ?></td>
                                        </tr>

                                    <?php } ?>
                                    </tbody>
                            </table>
                            <h4 class="text-right mr-5">
                                Total Keseluruhan : Rp.<?= number_format($total_keseluruhan, 0) ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>