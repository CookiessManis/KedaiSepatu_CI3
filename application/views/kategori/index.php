<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-primary"><?= $title ?></h1>





    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
        </div>
        <div class="card-tools  mx-3">
            <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i>
                Add Kategori
            </button>
        </div>

        <div class="card-body">

            <?php
            if ($this->session->flashdata('pesan')) {
                echo ' <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> ';
                echo $this->session->flashdata('pesan');
                echo '</h5>
            </div>';
            }
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>

                        <?php foreach ($Kategori as $key => $value) { ?>

                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->nama_kategori ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning rounded-sm" data-toggle="modal" data-target="#edit<?= $value->id_kategori ?>"><i class="fas fa-fw fa-pen"></i></button>
                                    <button type="button" class="btn btn-danger rounded-sm" data-toggle="modal" data-target="#delete<?= $value->id_kategori ?>"><i class="fas fa-fw fa-trash"></i></button>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Kategori -->

    <!-- Modal -->
    <div class="modal fade" id="tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open('kategori/add'); ?>

                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" placeholder="Masukan Kategori" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>

    <!-- modal edit Kategori-->
    <?php
    foreach ($Kategori as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value->id_kategori ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Kategori</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <?php
                        echo form_open('Kategori/edit/' . $value->id_kategori);
                        ?>

                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" name="nama_kategori" value="<?= $value->nama_kategori ?>" class="form-control" id="nama_kategori" placeholder="Masukkan Kategori" required>
                        </div>


                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save </button>

                        <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php } ?>


    <?php
    foreach ($Kategori as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value->id_kategori ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"> Hapus Kategori <b> <?= $value->nama_kategori ?></b> ? </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">





                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="<?= base_url('kategori/delete/' . $value->id_kategori) ?>" class="btn btn-primary">Delete </a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php } ?>