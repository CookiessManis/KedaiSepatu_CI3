<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
        </div>
        <div class="card-tools  mx-3">
            <a href="<?= base_url('barang/add') ?>" type="button" class="btn btn-primary btn-sm "><i class="fas fa-plus"></i>
                Tambah Barang
            </a>
        </div>
        <?php
        if ($this->session->flashdata('pesan')) {
            echo '   <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> ';
            echo $this->session->flashdata('pesan');
            echo '</h5></div>';
        }
        ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php $no = 1; ?>
                    <?php foreach ($barang as $key => $value) { ?>
                        <tbody>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->nama_barang ?></td>
                                <td><?= $value->nama_kategori ?></td>
                                <td><?= $value->harga ?></td>
                                <td><?= $value->stok ?></td>
                                <td><?= $value->deskripsi ?></td>
                                <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="150px"></td>
                                <td>
                                    <a href="<?= base_url('barang/edit/' . $value->id_barang) ?>" class="btn btn-warning btn-sm"> <i class="fas fa-pen"></i></a>

                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_barang ?>"> <i class="fas fa-trash"></i></button>
                                </td>
                            </tr>


                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Bagian Delete -->
<?php
foreach ($barang as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_barang ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Hapus Data Barang </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <h3>Apakah Anda Ingin Menghapus Data <b><?= $value->nama_barang ?> </b>?</h3>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('barang/delete/' . $value->id_barang) ?>" class="btn btn-primary">Delete </a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>