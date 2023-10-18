<div class="px-4 mt-4">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        </div>

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
        echo form_open('pelanggan/changepassword', array('id_pelanggan' => 'passwordForm')) ?>
        <?php
        if ($this->session->flashdata('pesan')) {
            echo '   <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> ';
            echo $this->session->flashdata('pesan');
            echo '</h5></div>';
        }
        ?>

        <div class="row">

            <div class="mx-auto col-md-8">

                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Ubah Password</h6>
                    </div>

                    <?= form_open_multipart('pelanggan/changepassword') ?>

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
                        <div class="form-group">
                            <label>Password Lama</label>
                            <input type="password" class="form-control" name="current_password" placeholder="Masukkan Password Lama">
                            <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" class="form-control" name="newpass" placeholder="Masukkan Password Baru">
                            <?= form_error('newpass', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label>Ulangi Password</label>
                            <input type="password" class="form-control" name="passconf" placeholder="Ulangi Password Baru">
                            <?= form_error('passconf', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>




                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                    <?= form_close() ?>
                </div>

            </div>



        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
</div>
<!-- End of Main Content -->