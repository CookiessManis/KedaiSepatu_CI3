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
                     <div class="card-header py-3">
                         <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                     </div>
                     <div class="card-body text-center">
                         <img src="<?php echo base_url('assets/foto/' . $this->session->userdata('gambar')) ?>" width="50" height="50" class="brand-image img-circle elevation-3 shadow-lg" style="opacity: 1">

                     </div>
                     <div class="card-body">
                         <table class="table">

                             <tr>
                                 <td>Nama Pelanggan : <?= $pelanggan['nama_pelanggan'] ?></td>
                             </tr>
                             <tr>
                                 <td>Email Pelanggan : <?= $pelanggan['email'] ?></td>
                             </tr>


                         </table>

                     </div>
                     <div class="px-4 text-right mb-4">
                         <a href="<?= base_url('pelanggan/changepassword')?>"  class="btn btn-warning"><i class="fas  fa-lock"> Ubah Password</i></a>
                         
                         <a href="<?= base_url('pelanggan/edit')?>" class="btn btn-primary"><i class="fas  fa-user"> Ubah Profile</i></a>
                     </div>
                 </div>

             </div>



         </div>

     </div>

 </div>
 <!-- /.container-fluid -->

 </div>
 </div>
 <!-- End of Main Content -->