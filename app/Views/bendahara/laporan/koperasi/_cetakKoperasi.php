<html>

<head>
    <title>Cetak Koperasi</title>
    <style>
        @page {
            size: A4;
            margin: 0
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            margin: 0;
            padding: 0;
            background-image: url('data:image/jpeg;base64,<?= $header; ?>');
            background-size: 100% 3.98cm;
            background-position: top left;
            background-repeat: no-repeat;
        }

        .footer {
            width: 100%;
            height: 3.98cm;
            background-image: url('data:image/jpeg;base64,<?= $footer; ?>');
            background-size: 100% 100%;
            /* Sesuaikan dengan ukuran gambar footer */
            background-position: bottom left;
            background-repeat: no-repeat;
            position: fixed;
            bottom: 0;
            left: 0;
        }


        .sheet {
            padding: 10mm;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }

        h1 {
            font-weight: bold;
            font-size: 16pt;
            text-align: center;
            line-height: 1.2;
            margin-bottom: 10px;
        }

        h2 {
            font-weight: bold;
            font-size: 10pt;
            text-align: center;
            line-height: 1;
        }

        .banyuasin {
            width: 100%;
            height: 3.98cm;
            float: left;
            /* margin-right: 10px; */
            padding: 0;
        }

        .tut-wuri {
            width: 90px;
            float: right;
            margin-left: 10px;
            margin-top: -8px;
        }

        hr {
            border: none;
            border-top: 2px solid black;
            margin: 10px 0;
        }

        .satu {
            font-size: 17pt;
            text-align: center;
            line-height: 1.2;
            margin-bottom: 10px;
        }

        .alamat {
            font-weight: bold;
            font-size: 10pt;
            text-align: center;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            padding: 6px;
            border: 1px solid black;
        }

        .kode-pengembalian,
        .nama,
        .nama-barang,
        .jumlah,
        .keterangan,
        .tanggal-pengembalian,
        .tanggal-pengembalian {
            font-weight: bold;
        }

        .ttd {
            position: relative;
            text-align: right;
            /* bottom: 190px; */
            margin-left: 520px;
            margin-top: 30px;
        }

        .pak-ahmat {
            position: relative;
            right: 78px;
            line-height: 0.5;
        }

        .tertanda {
            position: relative;
            right: 90px;
            line-height: 0.5;
            margin-bottom: 100px;
        }

        .nip {
            position: relative;
            right: 51px;
            line-height: 0.5;
        }
    </style>
</head>

<body class="A4">
    <section class="sheet">
        <hr style="margin-top: 130px;">
        <div class="container">
            <h1 style="margin-top: 30px; margin-bottom: 30px;">LAPORAN KOPERASI PONDOK PESANTREN TAHFIZ QUR'AN IBADURROHMAN</h1>
            <p>Tanggal : <?= $tanggal_awal; ?> Sampai : <?= $tanggal_akhir; ?></p>
            <br>
            <table>
                <thead style="font-size: 13pt; font-weight: bold;">
                    <tr>
                        <td>No.</td>
                        <td>Jumlah</td>
                        <td>Tanggal</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($koperasi as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= $value->jumlah; ?></td>
                            <td><?= $value->tanggal; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="ttd">
                <p class="tertanda">Mudir Pesantren,</p>
                <p>________________________</p>
                <p class="pak-ahmat">Syuryadi, SE.,M.Sh</p>
                <!-- <p class="nip">NIP. 20001101078203829387</p> -->
            </div>
        </div>
    </section>
    <img src="data:image/jpeg;base64,<?= $footer; ?>" alt="logo-pesantren" class="footer">
</body>

</html>