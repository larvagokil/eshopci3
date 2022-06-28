<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; e-Shopindo <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Homepage Modal-->
<div class="modal fade" id="homeModal" tabindex="-1" role="dialog" aria-labelledby="homeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Homepage?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Homepage" if you are ready to Homepage.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('main'); ?>">Homepage</a>
            </div>
        </div>
    </div>
</div>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Detail transaksi Modal -->
<div class="modal fade" id="transModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <button class="close ml-auto pt-2 pr-2" type="button" data-dismiss="modal" aria-label="Close" class="ml-auto d-block">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-header pt-0">
                <h5 class="modal-title mx-auto" id="exampleModalLabel"><b> Detail Transaksi </b></h5>
            </div>
            <div class="modal-body text-dark">                
                <div class="row">
                    <div class="col"><b>Status</b></div>
                    <div class="col text-right" id="status">Dikirim</div>
                </div>
                <div class="row">
                    <div class="col">No transaksi</div>
                    <div class="col text-right" id="id">ESI-asdasdadasdasdsada</div>
                </div>
                <div class="row">
                    <div class="col">Tanggal Pembelian</div>
                    <div class="col text-right" id="waktu">12 juni 2021, 03:05 WIB</div>
                    <div class="col-12"><hr></div>
                </div>
                <div class="row">
                    <div class="col-12"><b>Info Pengiriman</b></div>
                    <div class="col">Kurir</b></div>
                    <div class="col-8 ml-auto" id="jeniskirim">TIKI</b></div>
                </div>
                <div class="row">
                    <div class="col">No. resi</div>
                    <div class="col-8 ml-auto">123123112312</div>
                </div>
                <div class="row">
                    <div class="col-4">Nama Penerima</div>
                    <div class="col-8 ml-auto" id="nm">Nama penerima</div>
                    <div class="col-4">No. telp</div>
                    <div class="col-8 ml-auto" id="notelp">628971760928</div>
                    <div class="col-4">Alamat</div>
                    <div class="col-8 ml-auto" id="alamat">jl. bantargebang setu no 51, rt 01/03, padurenan, mustika jaya Bekasi</div>
                    <div class="col-12"><hr></div>
                </div>
                <div class="row">
                    <div class="col-12"><b>Rincian Pembayaran</b></div>
                    <div class="col-6">Metode Pembayaran</div>
                    <div class="col-6 text-right" id="jenisbayar">Indomaret</div>
                    <div class="col-6">Jumlah Barang</div>
                    <div class="col-6 text-right" id="jml">2 barang</div>
                    <div class="col-6">Total Belanja</div>
                    <div class="col-6 text-right" id="total">Rp. 100.000</div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- punya datatables -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>
<!-- file jsnya datatables.. -->
<script src="<?= base_url() ?>assets/js/demo/datatables-demo.js"></script>

<script>
    function previewImg() {
        const image = document.querySelector('#image');
        const imageLabel = document.querySelector('.form-control');
        const imgPreview = document.querySelector('.img-thumbnail');

        imageLabel.textContent = image.files[0].name;
        const fileImage = new FileReader();
        fileImage.readAsDataURL(image.files[0]);

        fileImage.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<!-- script kirim data via modal -->
<script>
    $(document).ready(function() {

        $('#edit-barg').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            // var id = button.data('id') // Extract info from data-* attributes
            // var db = button.data('db')
            var modal = $(this)
            modal.find('#id').val(button.data('id'))
            modal.find('#nm').val(button.data('nm'))
            modal.find('#gbr').val(button.data('gbr'))
            var dkr = modal.find('#dkr').val(button.data('dkr'))
            modal.find('#hrg').val(button.data('hrg'))
            modal.find('#jml').val(button.data('jml'))
            CKEDITOR.instances['dkr'].setData(dkr);
        })
        $('#transModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            // var id = button.data('id') // Extract info from data-* attributes
            // var db = button.data('db')
            var modal = $(this)
            modal.find('#id').text(button.data('id'))
            modal.find('#nm').text(button.data('nm'))
            modal.find('#notelp').text(button.data('notelp'))
            modal.find('#alamat').text(button.data('alamat'))
            modal.find('#jeniskirim').text(button.data('jeniskirim'))
            modal.find('#jenisbayar').text(button.data('jenisbayar'))
            modal.find('#idb').text(button.data('idb'))
            modal.find('#jml').text(button.data('jml')+' barang')
            modal.find('#total').text(button.data('total'))
            modal.find('#waktu').text(button.data('waktu'))
            modal.find('#status').text(button.data('status'))

        })
    });
</script>
</body>

</html>