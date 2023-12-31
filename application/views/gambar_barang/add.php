<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Gambar Barang : <?= $barang->nama_barang ?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <?php
            //notifikasi gambar berhasil ditambahkan
            if ($this->session->flashdata('pesan')) {
                echo '   <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> ';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
            }
            //notifikasi_data_tidak_diisi
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i>', ' </h5></div>');
            //notifikasi_gagal_upload
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5></div>';
            }
            echo form_open_multipart('gambar_barang/add/' . $barang->id_barang) ?>

            <div class="row">
                <div class="col-sm-8">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Keterangan Barang</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan Barang" value="<?= set_value('keterangan') ?>">
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-sm-5">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Gambar Barang</label>
                        <input type="file" name="gambar" class="form-control" id="preview_gambar" required>
                    </div>

                </div>
                <div class="col-sm-4">
                    <!-- textarea -->
                    <div class="form-group">
                        <img src="<?= base_url('assets/gambar/no_shoes.jpg') ?>" id="gambar_load" width="200px">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a href="<?= base_url('gambar_barang') ?>" class="btn btn-success btn-sm">Kembali</a>
            </div>

            <?php
            echo form_close();
            ?>

            <hr>
            <small class="text-danger">Ukuran Harap 1:1 Agar Tampilan Produk Sesuai!</small>
            <div class="row">
                <?php foreach ($gambar as $key => $value) { ?>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <center>

                                <img src="<?= base_url('assets/gambar_barang/' . $value->gambar) ?>" id="gambar_load" width="300px" height="200px">
                            </center>
                        </div>
                        <p for="">Keterangan: <?php echo $value->keterangan ?></p>
                        <button class="btn btn-danger btn-xs btn-block" data-toggle="modal" data-target="#delete<?= $value->id_gambar ?>"> <i class="fas fa-trash">Delete</i></button>

                    </div>
                <?php } ?>
            </div>


        </div>
    </div>
</div>
</div>


<!-- Modal Bagian Delete -->
<?php
foreach ($gambar as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_gambar ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><b> Hapus Gambar Barang </b> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">



                    <div class="form-group">
                        <center>

                            <img src="<?= base_url('assets/gambar_barang/' . $value->gambar) ?>" id="gambar_load" width="300px" height="200px">
                        </center>
                        <h5 class="text-center">Apakah Anda Akan Menghapus Gambar Ini?</h5>
                    </div>


                </div>
                
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('gambar_barang/delete/' . $value->id_barang . '/'  . $value->id_gambar) ?>" class="btn btn-primary">Delete </a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

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