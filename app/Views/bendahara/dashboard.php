<?= $this->extend('layout/bendahara.php'); ?>

<?= $this->section('title'); ?>
<title>Dashboard</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h4>Rp. <?= number_format($saldo_kas, 2, ",", "."); ?></h4>

                            <p>Saldo Kas</p>
                        </div>
                        <div class="icon">
                            <i class="icon fas fa-wallet"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h4>Rp. <?= number_format($pemasukan_bulan_ini, 2, ",", "."); ?></h4>

                            <p>Pemasukan Bulan Ini</p>
                        </div>
                        <div class="icon">
                            <i class="icon fas fa-money-bill-wave"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h4>Rp. <?= number_format($pengeluaran_bulan_ini, 2, ",", "."); ?></h4>

                            <p>Pengeluaran Bulan Ini</p>
                        </div>
                        <div class="icon">
                            <i class="icon fas fa-receipt"></i>
                        </div>
                        <a href="<?= base_url(); ?>admin/keluar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h4>Rp. <?= number_format($spp_tahun_ini, 2, ",", "."); ?></h4>

                            <p>Pemasukan Spp Tahun Ini</p>
                        </div>
                        <div class="icon">
                            <i class="icon fas fa-user-graduate"></i>
                        </div>
                        <a href="<?= base_url(); ?>admin/spp" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h4>Rp. <?= number_format($donatur_bulan_ini, 2, ",", "."); ?></h4>

                            <p>Pemasukan Donatur Bulan Ini</p>
                        </div>
                        <div class="icon">
                            <i class="icon fas fa-hand-holding-medical"></i>
                        </div>
                        <a href="<?= base_url(); ?>admin/masuk/donatur" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h4>Rp. <?= number_format($koperasi_bulan_ini, 2, ",", "."); ?></h4>

                            <p>Pemasukan Koperasi Bulan Ini</p>
                        </div>
                        <div class="icon">
                            <i class="icon fas fa-building"></i>
                        </div>
                        <a href="<?= base_url(); ?>admin/masuk/koperasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h4>Rp. <?= number_format($barber_bulan_ini, 2, ",", "."); ?></h4>

                            <p>Pemasukan Barber Bulan Ini</p>
                        </div>
                        <div class="icon">
                            <i class="icon fas fa-cut"></i>
                        </div>
                        <a href="<?= base_url(); ?>admin/masuk/barber" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div>
                <canvas id="myChart"></canvas>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132)', // Merah
                    'rgba(54, 162, 235)', // Biru
                    'rgba(255, 206, 86)', // Kuning
                    'rgba(75, 192, 192)', // Hijau
                    'rgba(153, 102, 255)', // Ungu
                    'rgba(255, 159, 64)' // Orange
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)', // Merah
                    'rgba(54, 162, 235, 1)', // Biru
                    'rgba(255, 206, 86, 1)', // Kuning
                    'rgba(75, 192, 192, 1)', // Hijau
                    'rgba(153, 102, 255, 1)', // Ungu
                    'rgba(255, 159, 64, 1)' // Orange
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<?= $this->endSection(); ?>