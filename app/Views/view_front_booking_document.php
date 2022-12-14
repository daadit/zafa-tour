<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zafa Tour Padang</title>
    <link rel="stylesheet" href="<?= base_url() ?>/assets-front/vendors/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets-front/css/style.css">
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo.png">
</head>

<body>
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
                            <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('about') ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('paket') ?>">Paket</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url('booking') ?>" style="color: #F7C114;">Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('payment') ?>">Pembayaran</a>
                        </li>
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
                <h2>Dokumen Jamaah</h2>
                <h5>Harap lengkapi data yang diminta dibawah ini.</h5>
            </section>
            <section class="contact-form-wrapper">
                <form action="<?= base_url('booking/document/save') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="idtransaksi" id="idtransaksi" value="<?= $nomorbooking; ?>">
                    <input type="hidden" name="urut" id="urut" value="<?= $urut; ?>">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="nik">NIK <sup>*</sup></label>
                            <input type="text" onkeypress="return onlyNumber(event)" required class="form-control" id="nik" name="nik" placeholder="137100xxxxxxx *">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nama">NAMA <sup>*</sup></label>
                            <input type="text" required class="form-control" id="nama" name="nama" placeholder="Jhon Dxxx *">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="notelp">NO. TELP <sup>*</sup></label>
                            <input type="text" onkeypress="return onlyNumber(event)" required class="form-control" id="notelp" name="notelp" placeholder="0821xxxxxxx *">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="tempat">TEMPAT LAHIR <sup>*</sup></label>
                            <input type="text" required class="form-control" id="tempat" name="tempat" placeholder="Padang *">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tgllahir">TANGGAL LAHIR <sup>*</sup></label>
                            <input type="date" required class="form-control" id="tgllahir" name="tgllahir">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="alamat">ALAMAT <sup>*</sup></label>
                            <textarea name="alamat" required id="alamat" class="form-control" rows="5" placeholder="Jalan Merdeka No. 18 *"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="jenkel">JENIS KELAMIN <sup>*</sup></label>
                            <select name="jenkel" required id="jenkel" class="form-control jenkel">
                                <option value="1">Laki-Laki</option>
                                <option value="0">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="passport">NO. PASSPORT <sup>*</sup></label>
                            <input type="text" required onkeypress="return onlyNumber(event)" class="form-control" id="passport" name="passport" placeholder="11341xxxxxx *">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tglpassport">TANGGAL BERLAKU <sup>*</sup></label>
                            <input type="date" required class="form-control" id="tglpassport" name="tglpassport">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="fotoktp">FOTO KTP <sup>*</sup></label>
                            <input type="file" required class="form-control" id="fotoktp" name="fotoktp">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fotopassport">FOTO PASSPORT <sup>*</sup></label>
                            <input type="file" required class="form-control" id="fotopassport" name="fotopassport">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" onclick="triggerSubmit()" class="btn btn-primary mb-4">Submit</button>
                        <button type="submit" class="btn btn-primary mb-4 btnsubmit" id="btnsubmit" name="btnsubmit">Submit</button>
                    </div>
                </form>
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
    <script src="<?= base_url() ?>/assets-front/vendors/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets-front/vendors/popper.js/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets-front/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <script>
        $('#btnsubmit').hide();

        function triggerSubmit() {
            let nik = $('#nik').val();
            let tgllahir = new Date($('#tgllahir').val());
            let year = tgllahir.getFullYear();
            let now = new Date().getFullYear();
            let kurang = now - year;

            if (nik.length > 16) {
                alert('Nik maksimal 16 karakter')
            } else if (nik.length < 16) {
                alert('Nik minimal 16 karakter')
            } else if (kurang < 18) {
                alert('Minimal umur 18 tahun')
            } else {
                $("#btnsubmit").click()
            }
        }

        function onlyNumber(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }
    </script>
</body>

</html>