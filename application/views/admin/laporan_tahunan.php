<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <h3>Tahun : <?= $tahun ?></h3>

    <div class="row px-3 mb-4">
        <a href="<?= base_url('laporan') ?>" class="btn btn-md btn-primary"><i class="fas fa-arrow-alt-circle-left"></i></a>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <div class="table-responsive">
                        <table class="table" width="100%" cellspacing="0">
                            <thead>

                                <tr>
                                    <th>No</th>
                                    <th>Invoice</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <div class="card-body">
                                <?php $no = 1;
                                $grand_total = 0;
                                foreach ($laporan as $key => $value) {
                                    $grand_total = $grand_total + $value->grand_total;
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?= $value->no_order ?></td>
                                        <td><?= $value->nama_pelanggan ?></td>
                                        <td><?= $value->tgl_order ?></td>
                                        <td>Rp.<?= number_format($value->grand_total, 0) ?></td>
                                    </tr>


                                <?php } ?>
                                </tbody>
                        </table>
                        <h4 class="text-right">
                            Total Keseluruhan : Rp.<?= number_format($grand_total, 0)  ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>