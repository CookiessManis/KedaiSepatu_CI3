<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Kedai Sepatu <i class="fas fa-store"></i></span>
        </div>
    </div>
</footer>
<hr>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->



<!-- xzoom -->
<script src="<?= base_url('assets/') ?>xzoom/dist/xzoom.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>

<!-- Select2 -->
<script src="<?= base_url('assets/') ?>plugins/select2/js/select2.full.min.js"></script>

<!-- Script Menampilkan Gambar -->
<script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>
<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4600
        });

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Keranjang Berhasil Ditambahkan'
            })
        });
    });
</script>

<script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
</script>
<!-- Script Xzoom -->

</body>


</html>