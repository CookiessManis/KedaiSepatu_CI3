    <!-- Main content -->
    <div class="px-2">
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
        <section class="content px-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            invoice :
                            <?= $no_order = date('Ymd') . strtoupper(random_string('alnum', 8)); ?>

                        </h3>


                        <h4>
                            <small class="right">Date: <?= date('d-M-Y') ?></small>
                        </h4>
                        <div class="card">
                            <div class="row">
                                <div class="col-12">

                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>QTY</th>
                                                    <th>Nama Barang</th>
                                                    <th>Harga</th>
                                                    <th>Berat</th>
                                                    <th>Total Harga</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $i = 1; ?>

                                            <?php

                                            $total_berat = 0;
                                            foreach ($this->cart->contents() as $items) {
                                                $barang = $this->M_barang->detail_barang($items['id']);
                                                $berat = $items['qty'] * $barang->berat;
                                                $total_berat = $total_berat + $berat;

                                            ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td class="col-1"> <?= $items['qty'] ?>
                                                        </td>
                                                        <td><?= $items['name']; ?>
                                                        </td>
                                                        <td>Rp.<?= number_format($items['price']) ?></td>
                                                        <td> <?= $berat ?> Gr</td>
                                                        <td>Rp.<?= number_format($items['subtotal']) ?></td>



                                                    </tr>

                                                    <?php $i++ ?>
                                                <?php } ?>

                                                </tbody>

                                        </table>


                                        <hr>

                                    </div>

                                    <!-- /.card-body -->
                                </div>

                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    <section class="content px-2">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><b>Pilih Lokasi</b></h3>


                </div>
                <!-- /.card-header -->
                <?php echo form_open('belanja/cekout') ?>
                <div class="card-body">
                    <div class="row">

                        <div class="col-8">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <select class="form-control select2bs4" style="width: 100%; " name="provinsi">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kota</label>
                                        <select class="form-control select2bs4" style="width: 100%; " name="kota">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Expedisi</label>
                                        <select class="form-control select2bs4" style="width: 100%; " name="expedisi">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Paket</label>
                                        <select class="form-control select2bs4" style="width: 100%; " name="paket">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Alamat</label>
                                        <input type="text" class="form-control" name="alamat"  placeholder="Masukkan Alamat">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kode Pos</label>
                                        <input type="number"  class="form-control" name="kode_pos"  placeholder="Masukkan Alamat">
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">No Kontak Pelanggan</label>
                                        <input type="number" name="hp_penerima" class="form-control"  placeholder="Masukkan No kontak">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="px-7">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <b>Rincian</b>
                                    </h3>
                                </div>
                                <div class="card-body">


                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Invoice</th>
                                                <td><?= $no_order ?></td>
                                            </tr>

                                            <tr>
                                                <th>Subtotal</th>
                                                <td><?= number_format($this->cart->total(), 0) ?></td>
                                            </tr>
                                            <tr>
                                                <th>Total Berat</th>
                                                <td><?= $total_berat ?> Gr</td>
                                            </tr>
                                            <tr>
                                                <th>Ongkir</th>
                                                <td><label id="ongkir"></label></td>
                                            </tr>
                                            <tr>
                                                <th>Total Bayar</th>
                                                <td><label id="total_bayar"></label></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- Simpan Transaksi -->
                    
                    <input name="no_order" value="<?= $no_order ?>" hidden>
                    <input name="estimasi" hidden>
                    <input name="ongkir" hidden>
                    <input name="berat" value="<?= $total_berat ?>" hidden> <br>
                    <input name="grand_total" value="<?= $this->cart->total() ?>" hidden>
                    <input name="total_bayar" hidden>
                    <!-- Akhir Simpan Transaksi -->

                    <!-- Simpan Rinci Transaksi -->
                    <?php
                    $i = 1;
                    foreach ($this->cart->contents() as $key => $value) {
                        echo
                        form_hidden('qty' . $i++, $items['qty']);
                    }
                    ?>

                    <div class="row no-print">
                        <div class="col-12">
                            <a href="<?= base_url('belanja') ?>" class="btn btn-dark"><i class="fa fa-caret-left"></i> Kembali Ke Keranjang</a>
                            <button type="submit" class="btn btn-primary float-right"><i class="fa fa-shoe-prints"></i> Check Out
                            </button>

                        </div>
                    </div>
                    <?= form_close() ?>

                </div>

            </div>
    </section>


    <script>
        //masukkan data provinsi
        $(document).ready(function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/provinsi') ?>",
                success: function(hasil_provinsi) {
                    //console.log(hasil_provinsi);
                    $("select[name=provinsi]").html(hasil_provinsi);
                }
            });
        });

        //masukkan data select kota 
        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });
        $("select[name=kota]").on("change", function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/expedisi') ?>",
                success: function(hasil_expedisi) {
                    $("select[name=expedisi]").html(hasil_expedisi);
                }
            });
        });
        $("select[name=expedisi]").on("change", function() {
            //mendapatkan data expedisi terpilih 
            var expedisi_terpilih = $("select[name=expedisi]").val()
            //mendapatkan id kota tujuan terpilih 
            var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');
            //mendapatkan data total berat 
            var total_berat = <?= $total_berat ?>;

            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/paket') ?>",
                data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
                success: function(hasil_paket) {
                    $("select[name=paket]").html(hasil_paket);
                }
            });
        });

        $("select[name=paket]").on("change", function() {
            //menampilkan data ongkir
            var data_ongkir = $("option:selected", this).attr('ongkir');
            var reverse = data_ongkir.toString().split('').reverse().join(''),
                ribuan_ongkir = reverse.match(/\d{1,3}/g);
            ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');
            $("#ongkir").html("Rp" + ribuan_ongkir)
            //menampilkan menghitung total transaksi bayar

            var total_bayar = parseInt(data_ongkir) + parseInt(<?= $this->cart->total() ?>);
            var reverse2 = total_bayar.toString().split('').reverse().join(''),
                ribuan_total_bayar = reverse2.match(/\d{1,3}/g);
            ribuan_total_bayar = ribuan_total_bayar.join(',').split('').reverse().join('');

            $("#total_bayar").html("Rp" + ribuan_total_bayar);
            //Hasil estimasi dan ongkir
            var estimasi = $("option:selected", this).attr('estimasi');
            $("input[name=estimasi]").val(estimasi);
            $("input[name=ongkir]").val(data_ongkir);
            $("input[name=total_bayar]").val(ribuan_total_bayar);
        });
    </script>