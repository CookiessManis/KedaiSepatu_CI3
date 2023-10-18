<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Data Pelanggan </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Nama Pelanggan</th>
                            <th>Foto Profile</th>
                        </tr>
                    </thead>


                    <tbody>
                            <?php foreach ($pelanggan as $key => $value) { ?>
                            <tr>
                                <td><?= $value->id_pelanggan ?></td>
                                <td><?= $value->email ?></td>
                                <td><?= $value->nama_pelanggan ?></td>
                                <td>
                                    <img src="<?= base_url('assets/foto/' . $value->gambar) ?>" width="120px" </td>
                            </tr>

                            <?php } ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>