<?php
$data_laporan = $this->M_admin->get_all_laporan();
$grand_total = 0;
foreach ($data_laporan as $key => $value) {
    $grand_total = $grand_total + $value->grand_total;
    $arrLaporan[] = ['label' => $value->tgl_order, 'y' => $value->grand_total];
}
?>

<script type="text/javascript">
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light1", // "light2", "dark1", "dark2"
            animationEnabled: false, // change to true		
            title: {
                text: "Hasil Penjualan"
            },
            data: [{
                // Change type to "bar", "area", "spline", "pie",etc.
                type: "column",
                // dataPoints: [
                // 	{ label: "apple",  y: 10  },
                // 	{ label: "orange", y: 15  },
                // 	{ label: "banana", y: 90  },
                // 	{ label: "mango",  y: 30  },
                // 	{ label: "grape",  y: 28  }
                // ]
                dataPoints: <?= json_encode($arrLaporan, JSON_NUMERIC_CHECK); ?>

            }]
        });
        chart.render();

    }
</script>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

    </div>

    <!-- Content Row -->
    <div class="row mb-4">


        <!-- Kelola Barang -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Barang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_barang ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Kategori</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_kategori ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Laporan Penjualan
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_laporan ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pesanan Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pesanan ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    </div>
    <center>
        <a class=" px-5  text-bold badge badge-danger ">
            Total Keseluruhan : Rp.<?= number_format($grand_total, 0) ?>
        </a>

</center>

</div>
</div>



<!-- Content Row -->