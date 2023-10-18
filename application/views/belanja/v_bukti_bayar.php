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
                <div class="col-sm-12">

                    <div class="card card-primary">
                    <div class="card-header">
                            <h3 class="card-title">Form Upload Bukti Pembayaran </h3>
                        </div>

                        <div class="card-body">
                            <p>Silahkan Melakukan Transfer Sesuai Nominal Dibawah Ini </p>
                            <h1 class="text-primary">Rp. <?= number_format($pesanan->grand_total, 0) ?></h1>

                            <table class="table">
                                <tr>
                                    <th>Nama Bank</th>
                                    <th>Nomor Rekening</th>
                                    <th>Atas Nama</th>
                                </tr>
                                <hr>
                                <?php foreach ($rekening as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value->nama_bank ?></td>
                                        <td><?= $value->no_rek ?></td>
                                        <td><?= $value->atas_nama ?></td>
                                    </tr>
                                <?php } ?>
                                

                            </table>
                            <?= form_open_multipart('pesanan_saya/bayar/' . $pesanan->id_transaksi) ?>
                            <hr>
                        <div class="card-body">
                            
                            
                            <div class="form-group">
                                <label>Atas Nama</label>
                                <input class="form-control" name="atas_nama" placeholder="Atas Nama" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Bank</label>
                                <input class="form-control" name="nama_bank" placeholder="Nama Bank" required>
                            </div>
                            <div class="form-group">
                                <label>Nomer Rekening</label>
                                <input class="form-control" name="no_rek" placeholder="Nomor Rekening" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Bukti Bayar</label>
                                <input type="file" class="form-control" required name="bukti_bayar" id="preview_gambar"></input>
                            </div>
                            <div class="form-group">
                                <img src="<?= base_url('assets/foto/no_photo.png') ?>" id="gambar_load" width="200px">
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="<?= base_url('pesanan_saya') ?>" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar").change(function() {
        bacaGambar(this);
    })
</script>