<?= $this->extend('layout/kepala_pondok.php'); ?>

<?= $this->section('title'); ?>
<title>Donatur</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tabel Donatur</h1>
                    <!-- Button trigger modal -->
                   
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>kepala">Dashboard</a></li>
                        <li class="breadcrumb-item active">donatur</li>
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
                <form action="<?= base_url(); ?>donatur/tambah" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="donatur">Donatur</label>
                            <input type="text" class="form-control" id="donatur" name="donatur" value="<?= old('donatur'); ?>" required>
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
                                        <th>Donatur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    <?php foreach ($donatur as $key => $value) : ?>
                                        <tr>
                                            <td class="col-1"><?= $no++; ?></td>
                                            <td><?= $value->donatur; ?></td>
                                            
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