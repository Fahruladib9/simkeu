<?= $this->extend('layout/admin_keu.php'); ?>

<?= $this->section('title'); ?>
<title>Santri</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tabel Santri</h1>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-secondary mt-4 px-3 ml-3" data-toggle="modal" data-target="#exampleModal">
                        Add Data
                    </button>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">santri</li>
                    </ol>
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
                <form action="<?= base_url(); ?>santri/tambah" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nis">Nis</label>
                            <input type="number" class="form-control" id="nis" name="nis" value="<?= old('nis'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_santri">Nama Santri</label>
                            <input type="text" class="form-control" id="nama_santri" name="nama_santri" value="<?= old('nama_santri'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select class="form-control searchselect" name="kelas" id="kelas" required>
                                <option value="">-- Pilih Kelas --</option>
                                <?php foreach ($kelas as $key => $value) : ?>
                                    <option value="<?= $value->kelas; ?>"><?= $value->kelas; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control searchselect" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= old('alamat'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No Hp</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= old('no_hp'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_wali">Nama Wali</label>
                            <input type="text" class="form-control" id="nama_wali" name="nama_wali" value="<?= old('nama_wali'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= old('tanggal_lahir'); ?>" required>
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
                            <h3 class="card-title">Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nis</th>
                                        <th>Nama Santri</th>
                                        <th>Kelas</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th>Nama Wali</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    <?php foreach ($santri as $key => $value) : ?>
                                        <tr>
                                            <td class="col-1"><?= $no++; ?></td>
                                            <td><?= $value->nis; ?></td>
                                            <td><?= $value->nama_santri; ?></td>
                                            <td><?= $value->kelas; ?></td>
                                            <td><?= $value->jenis_kelamin; ?></td>
                                            <td><?= $value->alamat; ?></td>
                                            <td><?= $value->no_hp; ?></td>
                                            <td><?= $value->nama_wali; ?></td>
                                            <td><?= date('d/m/Y', strtotime($value->tanggal_lahir)); ?></td>
                                            <td class="text-center">
                                                <?php if ($status[$key] === 'non aktif') : ?>
                                                    <i class="fas fa-times" style="color: #DC3545; font-size: 24px;"></i>
                                                <?php endif; ?>
                                                <?php if ($status[$key] === 'aktif') : ?>
                                                    <i class="fas fa-solid fa-check" style="color: #28A745; font-size: 24px;"></i>
                                                <?php endif; ?>
                                            </td>
                                            <td class="col-2 text-center">
                                                <a href="<?= base_url(); ?>santri/edit/<?= $value->id_santri; ?>" class="btn btn-warning btn-sm mr-1"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="<?= base_url(); ?>santri/delete/<?= $value->id_santri; ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus data?')">
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
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