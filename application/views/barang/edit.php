<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
        </div>
        <div class="card-body">
            <?php
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
            echo form_open_multipart('barang/edit/' . $barang->id_barang) ?>

            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?= $barang->nama_barang?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control">
                            <option value="<?= $barang->id_kategori?>"><?= $barang->nama_kategori?></option>
                            <?php foreach ($Kategori as $key => $value) { ?>
                                <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label> Barang</label>
                        <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga Barang" value="<?= $barang->harga ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label> Stok</label>
                        <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok Barang" value="<?= $barang->stok ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label> Berat</label>
                        <input type="number" min="0" class="form-control" name="berat" id="berat" placeholder="Berat Barang" value="<?= $barang->berat ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" placeholder="Masukkan Deskripsi" ><?= $barang->deskripsi ?>
                    </textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Ganti Gambar</label>
                        <input type="file" name="gambar" class="form-control" id="preview_gambar">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <img src="<?= base_url('assets/gambar/'.$barang->gambar) ?>" id="gambar_load" width="200px">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="<?= base_url('barang') ?>" class="btn btn-success btn-sm">Kembali</a>
                    </div>
                </div>
            </div>

            <?php
            echo form_close();
            ?>
        </div>
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