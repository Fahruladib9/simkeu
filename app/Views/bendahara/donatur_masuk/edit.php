<?= $this->extend('layout/admin_keu'); ?>

<?= $this->section('title'); ?>
<title>Keuangan masuk - Donatur</title>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data</h1>
                    <a href="<?= base_url(); ?>admin/masuk/donatur" class="btn btn-outline-secondary mt-4 px-3 ml-3">
                        Kembali
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>admin">Home</a></li>
                        <li class="breadcrumb-item active">masuk-donatur</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Modal -->


    <?php if (session()->getFlashdata('error')) : ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> <?= session()->getFlashdata('error'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-11 mx-auto">
                    <div class="card">
                        <!-- /.card-header -->
                        <form action="<?= base_url(); ?>admin/masuk/donatur/update/<?= $donatur->id_trDonatur; ?>" enctype="multipart/form-data" method="POST" class="m-4">
                            <div class="form-group">
                                <label for="nama_perusahaan">Nama Perusahaan</label>
                                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= $donatur->nama_perusahaan; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $donatur->email; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="no_wa">No Wa</label>
                                <input type="number" class="form-control" id="no_wa" name="no_wa" value="<?= $donatur->no_wa; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $donatur->jumlah; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_bayar">Jenis Bayar</label>
                                <select class="form-control" name="jenis_bayar" id="jenis_bayar" required>
                                    <option value="<?= $donatur->jenis_bayar; ?>"><?= $donatur->jenis_bayar; ?></option>
                                    <option class="jenis_bayar" value="Cash">Cash</option>
                                    <option class="jenis_bayar" value="Transfer">Transfer</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $donatur->alamat; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="bukti_bayar">Bukti Bayar</label>
                                <input type="file" class="form-control" id="bukti_bayar" name="bukti_bayar">
                                <span style="font-weight: normal;">*jpg/jpeg/png</span>, max size : <span style="font-weight: normal;">5mb</span>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $donatur->tanggal; ?>" required>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="reset" class="btn btn-secondary mr-2 mt-4">Reset</button>
                                <button type="submit" class="btn btn-primary mt-4">Update</button>
                            </div>
                        </form>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>template/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script>
    <?php if (session()->getFlashdata('title')) : ?>
        Swal.fire({
            title: "<?= session()->getFlashdata('title'); ?>",
            text: "<?= session()->getFlashdata('text'); ?>",
            icon: "<?= session()->getFlashdata('icon'); ?>"
        });
    <?php endif; ?>
</script>
<?= $this->endSection(); ?>