<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zafa Tour Padang</title>
    <link rel="stylesheet" href="<?= base_url() ?>/assets-front/vendors/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets-front/css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo.png">
    <script src="<?= base_url() ?>/assets-front/vendors/jquery/jquery.min.js"></script>
</head>

<body>
    <?php
    if (session()->getFlashdata('message')) { ?>
        <div class="alert alert-danger" style="position: fixed; bottom: 0; right: 0; margin: 50px;">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php } ?>
    <?php if (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success" style="position: fixed; bottom: 0; right: 0; margin: 50px;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php } ?>
    <header class="foi-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light foi-navbar">
                <a class="navbar-brand" href="<?= base_url('/') ?>">
                    <img src="<?= base_url() ?>/assets/images/logo.png" width="50px" height="50px" alt="FOI">
                </a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/') ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('about') ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('paket') ?>">Paket</a>
                        </li>
                        <?php if (session()->get('pesertaId')) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('booking') ?>" style="color: #F7C114;">Pesanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('payment') ?>">Pembayaran</a>
                            </li>
                        <?php } ?>
                    </ul>
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        <?php if (session()->get('pesertaId')) { ?>
                            <li class="nav-item">
                                <a class="btn btn-secondary" href="<?= base_url('logout') ?>">Logout</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item mr-2 mb-3 mb-lg-0">
                                <a class="btn btn-secondary" href="<?= base_url('register') ?>">Sign up</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-secondary" href="<?= base_url('login') ?>">Login</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <section class="page-header">
                <h2>Daftar Pesanan</h2>
                <h5>Pesanan yang pernah anda lakukan dapat dilihat disini</h5>
            </section>
            <section class="contact-form-wrapper">
                <table class="table table-striped" id="example" style="width:100%">
                    <thead style="background-color: #F7C114; color: white;">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nomor</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Paket</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($booking as $row) : $no++ ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $row['booking_nomor']; ?></td>
                                <td><?= date('d M Y', strtotime($row['booking_tanggal'])) ?></td>
                                <td><?= $row['paket_nama']; ?> (<?= "Rp. " . number_format($row['paket_harga'], 0, ',', '.') ?>)</td>
                                <td><?= $row['booking_jumlah']; ?> Orang</td>
                                <td><?= "Rp. " . number_format($row['booking_total'], 0, ',', '.') ?></td>
                                <td>
                                    <?php if ($row['booking_status'] == 1) { ?>
                                        Belum Bayar
                                    <?php } else if ($row['booking_status'] == 2) { ?>
                                        Sudah Bayar DP (Belum Verifikasi)
                                    <?php } else if ($row['booking_status'] == 3) { ?>
                                        Sudah Bayar DP (Sudah Verifikasi)
                                    <?php } else if ($row['booking_status'] == 4) { ?>
                                        Diverifikasi
                                    <?php } else if ($row['booking_status'] == 5) { ?>
                                        Selesai
                                    <?php } else if ($row['booking_status'] == 6) { ?>
                                        Batal
                                    <?php } else if ($row['booking_status'] == 7) { ?>
                                        Cicilan
                                    <?php } else if ($row['booking_status'] == 8) { ?>
                                        Sudah Bayar Lunas (Belum Verifikasi)
                                    <?php } else { ?>
                                        Sudah Bayar Lunas (Sudah Verifikasi)
                                    <?php } ?>
                                </td>
                                <td style="text-align: center;">
                                    <a target="__blank" class="badge bg-success pointer text-white" href="<?= base_url('booking/faktur/' . $row['booking_nomor']); ?>">Faktur</a>
                                    <?php if ($row['booking_status'] == 1) { ?>
                                        <a type="button" class="badge bg-danger pointer text-white" data-toggle="modal" data-target="#hapusModal<?= $row['booking_nomor']; ?>">Hapus</a>
                                    <?php } ?>
                                    <?php if ($row['booking_status'] == 3 || $row['booking_status'] == 9 || $row['booking_status'] == 7) { ?>
                                        <a type="button" class="badge bg-info pointer text-white" data-toggle="modal" data-target="#documentModal<?= $row['booking_nomor']; ?>">Document</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>


    <footer class="foi-footer text-white">
        <div class="container">
            <div class="row footer-content">
                <div class="col-xl-6 col-lg-7 col-md-8">
                    <h2 class="mb-0">Do you want to know more or just have a question? write to us.</h2>
                </div>
                <div class="col-md-4 col-lg-5 col-xl-6 py-3 py-md-0 d-md-flex align-items-center justify-content-end">
                    <a href="<?= base_url('contact') ?>" class="btn btn-secondary btn-lg">Contact form</a>
                </div>
            </div>
            <div class="row footer-widget-area">
                <div class="col-md-3">
                    <div class="py-3">
                        <img src="<?= base_url() ?>/assets/images/logo.png" width="50px" height="50px" alt="FOI">
                    </div>
                    <p class="font-os font-weight-semibold mb3">Get our mobile app</p>
                    <div>
                        <button class="btn btn-app-download mr-2"><img src="<?= base_url() ?>/assets-front/images/ios.svg" alt="App store"></button>
                        <button class="btn btn-app-download"><img src="<?= base_url() ?>/assets-front/images/android.svg" alt="play store"></button>
                    </div>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <nav>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Account</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">My tasks</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Projects</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Edit profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Activity</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <nav>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#!" class="nav-link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Services</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Careers <span class="badge badge-pill badge-secondary ml-3">Hiring</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Shop with us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <p>
                        &copy; Zafa Tour. 2022 <a href="https://www.zafatourpadang.com" target="_blank" rel="noopener noreferrer" class="text-reset">Zafa Tour</a>.
                    </p>
                    <p>All rights reserved.</p>
                    <nav class="social-menu">
                        <a href="#!"><img src="<?= base_url() ?>/assets-front/images/facebook.svg" alt="facebook"></a>
                        <a href="#!"><img src="<?= base_url() ?>/assets-front/images/instagram.svg" alt="instagram"></a>
                        <a href="#!"><img src="<?= base_url() ?>/assets-front/images/twitter.svg" alt="twitter"></a>
                        <a href="#!"><img src="<?= base_url() ?>/assets-front/images/youtube.svg" alt="youtube"></a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>

    <?php foreach ($booking as $row) : ?>
        <div id="documentModal<?= $row['booking_nomor']; ?>" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="">Upload document peserta</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <?php
                            for ($x = 1; $x <= $row['booking_jumlah']; $x++) { ?>
                                <?php
                                $faktur = (string) $row['booking_nomor'];
                                $db = db_connect();
                                $queryeksekusi = "SELECT document_peserta FROM tb_document WHERE document_booking = '$faktur' AND document_peserta = '$x'";
                                $detail = $db->query($queryeksekusi);
                                ?>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h6 class="text-dark">Peserta <?= $x; ?></h6>
                                        <?php if ($detail->getResultArray() == null) { ?>
                                            <a type="button" href="<?= base_url('booking/document/' . $row['booking_nomor'] . '/' . $x) ?>" class="btn btn-primary text-white">Upload</a>
                                        <?php } else { ?>
                                            <a type="button" href="<?= base_url('booking/document/edit/' . $row['booking_nomor'] . '/' . $x) ?>" class="btn btn-success text-white">Edit</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="<?= base_url('booking/delete') ?>" method="POST" enctype="multipart/form-data">
            <div id="hapusModal<?= $row['booking_nomor']; ?>" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="">Yakin hapus paket?</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id" value="<?= $row['booking_nomor']; ?>">
                            <h6>Tindakan ini tidak dapat dikembalikan</h6>
                        </div>
                        <div class="modal-footer">
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Yakin</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php endforeach; ?>

    <script>
        let totalharga = 0;

        function myFunction() {
            let jumlah = $('#jumlah').val()
            let harga = $('#harga').val()

            totalharga = parseInt(jumlah) * parseInt(harga)

            $('#total').val(totalharga);

            document.getElementById('totaltampil').innerHTML = 'Rp. ' + totalharga;
            document.getElementById('jumlahtampil').innerHTML = jumlah + ' Orang';
        }

        function onlyNumber(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }

        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true
            });
        });
    </script>

    <script src="<?= base_url() ?>/assets-front/vendors/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets-front/vendors/popper.js/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets-front/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</body>

</html>