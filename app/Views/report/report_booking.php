<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Booking</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo.png">
    <style type="text/css">
        .head {
            border-style: double;
            border-width: 3px;
            border-color: white;
        }

        .body {
            border-collapse: collapse;
            border: 1px;
            border-color: black;
        }

        table tr .text2 {
            text-align: right;
            font-size: 13px;
        }

        table tr .text {
            text-align: center;
            font-size: 13px;
        }

        table tr td {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <center>
        <table class="head" width="1000">
            <tr>
                <td>
                    <center>
                        <font size="5"><b>Zafa Tour Padang</b></font><br>
                        <font size="2">Alamat : Jalan Ampang Karang Ganting No. 16</font><br>
                        <font size="2"><i>Email : zafatourpadang@gmail.com Telp./Fax (0821) 7153 8531</i></font>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <table width="1000" class="head">
                <tr>
                    <td class="text2">Kota Padang, <?= date("d M Y"); ?></td>
                </tr>
            </table>
        </table>
        <table class="head" style="margin-bottom: 20px;">
            <tr>
                <td>Laporan Data Booking</td>
            </tr>
        </table>
        <table border="1" class="body" width="1000">
            <thead>
                <tr style="height: 25px;">
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Peserta</th>
                    <th>Paket</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                foreach ($booking as $row) : $no++ ?>
                    <tr style="height: 20px; text-align: center;">
                        <td> <?= $row['booking_nomor']; ?></td>
                        <td> <?= date('d M Y', strtotime($row['booking_tanggal'])) ?></td>
                        <td> <?= $row['peserta_nama']; ?></td>
                        <td> <?= $row['paket_nama']; ?> (<?= "Rp. " . number_format($row['paket_harga'], 0, ',', '.') ?>)</td>
                        <td>
                            <?php if ($row['booking_jenis'] == 0) { ?>
                                Perorangan
                            <?php } else { ?>
                                Kelompok
                            <?php } ?>
                        </td>
                        <td> <?= $row['booking_jumlah']; ?> Orang</td>
                        <td> <?= "Rp. " . number_format($row['booking_total'], 0, ',', '.') ?></td>
                        <td>
                            <?php if ($row['booking_status'] == 1) { ?>
                                Belum Bayar
                            <?php } else if ($row['booking_status'] == 2) { ?>
                                Sudah Bayar (DP)
                            <?php } else if ($row['booking_status'] == 3) { ?>
                                Sudah Bayar (LUNAS)
                            <?php } else if ($row['booking_status'] == 4) { ?>
                                Diverifikasi
                            <?php } else if ($row['booking_status'] == 5) { ?>
                                Selesai
                            <?php } else { ?>
                                Batal
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <table width="1000" style="margin-top: 30px;">
            <tr style="text-align: right !important;">
                <td>Kota Padang, <?= date("d M Y"); ?></td>
            </tr>
            <tr style="text-align: right !important;">
                <td>Pimpinan</td>
            </tr>
            <tr style="text-align: right !important; height: 120px;">
                <td>(...........................................)</td>
            </tr>
        </table>
    </center>
</body>

<script>
    window.print();
</script>

</html>