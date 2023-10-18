<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Gambar Barang</h6>
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
                            <th>Cover Barang</th>
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($gambarbarang as $key => $value) { ?>

                            <tr>

                                <td><?= $no++ ?></td>
                                <td><?= $value->nama_barang ?></td>
                                <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="150px"></td>
                                <td><?= $value->total_gambar ?></td>
                                <td>
                                    <a href="<?= base_url('gambar_barang/add/' . $value->id_barang) ?>" type="button" class="btn btn-primary btn-sm "><i class="fas fa-plus"></i>
                                        Tambah Gambar Barang
                                    </a>
                                </td>

                            </tr>


                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>