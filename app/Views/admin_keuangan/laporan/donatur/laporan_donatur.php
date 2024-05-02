<?= $this->extend('layout/admin_keu.php'); ?>

<?= $this->section('title'); ?>
<title>Laporan - Donatur</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Donatur</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">laporan-donatur</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="section-header-button mb-3">
                <a href="/" class="btn btn-outline-secondary">Kembali</a>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pilih Rentang Tanggal</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url(); ?>laporan/donatur/cetak" method="post" autocomplete="off">
                        <div class="form-group">
                            <label for="tanggal_awal">Tanggal Awal *</label>
                            <input type="date" id="tanggal_awal" name="tanggal_awal" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_akhir">Tanggal Akhir *</label>
                            <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success mx-2"><i class="fas fa-print"></i> Cetak</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>