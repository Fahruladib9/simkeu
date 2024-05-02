<?= $this->extend('layout/kepala_pondok.php'); ?>

<?= $this->section('title'); ?>
<title>Keuangan masuk - Donatur</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tabel Donatur</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">masuk-donatur</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h4>Rp. <?= number_format($donatur_bulan_ini, 2, ",", "."); ?></h4>

                            <p>Pemasukan Bulan Ini</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-solid fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <!-- Button trigger modal -->
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url(); ?>masuk/donatur/tambah" method="POST" enctype="multipart/form-data">
                    <div class=" modal-body">
                        <div class="form-group">
                            <label for="nama_perusahaan">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= old('nama_perusahaan'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= old('email'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="no_wa">No Wa</label>
                            <input type="number" class="form-control" id="no_wa" name="no_wa" value="<?= old('no_wa'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= old('jumlah'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_bayar">Jenis Bayar</label>
                            <select class="form-control" name="jenis_bayar" id="jenis_bayar" required>
                                <option value="">-- Jenis Bayar --</option>
                                <option class="jenis_bayar" value="Cash">Cash</option>
                                <option class="jenis_bayar" value="Transfer">Transfer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= old('alamat'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="bukti_bayar">Bukti Bayar</label>
                            <input type="file" class="form-control" id="bukti_bayar" name="bukti_bayar" value="<?= old('bukti_bayar'); ?>" required>
                            <span style="font-weight: normal;">*jpg/jpeg/png</span>, max size : <span style="font-weight: normal;">5mb</span>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Donatur</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Email</th>
                                        <th>No Wa</th>
                                        <th>Jumlah</th>
                                        <th>Pembayaran</th>
                                        <th>Alamat</th>
                                        <th>Bukti Bayar</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($donatur as $key => $value) : ?>
                                        <tr>
                                            <td class="col-1"><?= $key + 1; ?></td>
                                            <td><?= $value->nama_perusahaan; ?></td>
                                            <td><?= $value->email; ?></td>
                                            <td><?= $value->no_wa; ?></td>
                                            <td>Rp. <?= number_format($value->jumlah, 2, ",", "."); ?></td>
                                            <td><?= $value->jenis_bayar; ?></td>
                                            <td><?= $value->alamat; ?></td>
                                            <td>
                                                <a href="<?= base_url() . "assets/img/bukti_bayar/" . $value->bukti_bayar ?>" target="_blank"><img src="<?= base_url() . "assets/img/bukti_bayar/" . $value->bukti_bayar ?>" alt="bukti bayar" width="80px" height="80px"></a>
                                            </td>
                                            <td><?= date('d/m/Y', strtotime($value->tanggal)); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
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