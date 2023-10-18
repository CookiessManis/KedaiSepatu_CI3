<div class="px-4 mt-4">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        </div>

        <div class="row">

            <div class="mx-auto col-md-8">

                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <?= $this->session->flashdata('message') ?>
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                    </div>
                    <div class="card-body text-center">
                        <img src="<?php echo base_url('assets/foto/' . $this->session->userdata('gambar')) ?>" width="50" height="50" class="brand-image img-circle elevation-3 shadow-lg" style="opacity: 1">

                    </div>
                    <?= form_open('pelanggan/edit') ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <input type="text" class="form-control" name="nama_pelanggan" placeholder="Enter Name" value="<?= $pelanggan['nama_pelanggan'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Email Pelanggan</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?= $pelanggan['email'] ?> " readonly>
                        </div>




                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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