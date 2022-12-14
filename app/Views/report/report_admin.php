<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Admin</title>
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
        <table class="head" width="700">
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
            <table width="700" class="head">
                <tr>
                    <td class="text2">Kota Padang, <?= date("d M Y"); ?></td>
                </tr>
            </table>
        </table>
        <table class="head" style="margin-bottom: 20px;">
            <tr>
                <td>Laporan Data Admin</td>
            </tr>
        </table>
        <table border="1" class="body" width="700">
            <thead>
                <tr style="height: 25px;">
                    <th>No.</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Level</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                foreach ($admin as $row) : $no++ ?>
                    <tr style="height: 20px; text-align: center;">
                        <td> <?= $no; ?></td>
                        <td> <?= $row['admin_email']; ?></td>
                        <td> <?= $row['admin_name']; ?></td>
                        <td>
                            <?php if ($row['admin_level'] == 1) { ?>
                                Admin
                            <?php } else if ($row['admin_level'] == 0) { ?>
                                Super Admin
                            <?php } else if ($row['admin_level'] == 2) { ?>
                                Pimpinan
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <table width="700" style="margin-top: 30px;">
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