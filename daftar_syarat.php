<?php
//start the session
session_start();

if (!isset($_SESSION)) {
    echo 'ada';
    exit();
    //echo'<script> window.location="index.php"; </script> ';
}
include "koneksi/koneksi.php";
$_SESSION['is_data_parent_exist'] = "";
$_SESSION['is_data_student_exist'] = "";
$_SESSION['is_data_account_exist'] = "";

if (isset($_POST['submit'])) {
    foreach ($_POST as $key => $val) {
        ${$key} = $val;
        $_SESSION['' . $key . ''] = $val;
    }

    if (!empty($_SESSION)) {
        echo '<script> window.location="daftar_data_orangtua.php"; </script> ';
        print_r($_SESSION);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Registrasi | SIPM</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/main.css">

</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
                <div class="card" style="margin-top: 50px">
                    <div class="card-header" data-background-color="gb">
                        <h4 class="title"><b>Syarat Pendaftaran</b></h4>
                        <p class="category">Isi Form pendaftaran dengan benar</p>
                    </div>
                    <div class="card-content">
                        <h3>Berikut adalah syarat pendaftaran siswa baru yang harus dipenuhi :</h3>
                        <ol>
                            <li>
                                <font color="#2ecc71">Mengisi Formulir Pendaftaran <i class="fa fa-check"></font></i>
                            </li>
                            <li>Upload Surat Pengantar Magang Dari Sekolah / Kampus</li>
                            <li>Upload Pas Foto</li>
                        </ol>

                        <h6><i><b>*Catatan : Segeralah melengkapi persyaratan setelah anda melakukan pendaftaran!</b></i></h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
                <div class="card" style="margin-top: 50px">
                    <div class="card-header" data-background-color="gb">
                        <h4 class="title"><b>Data Pendaftar</b></h4>
                        <p class="category">Periksan data anda dibawah, pastikan sudah benar</p>
                    </div>
                    <div class="card-content table-responsive">

                        <a href="daftar_magang_baru.php" class="btn btn-primary pull-right"><i class="fa fa-pencil"></i> Edit Data</a>
                        <h3 style="overflow: hidden;"><b>Data Calon Siswa</b></h3>
                        <table class="table table-hover">

                            <tbody>
                                <b>Data Diri</b>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td>:<?php isset($_SESSION['email'])  ?  print($_SESSION['email']) : ""; ?> &nbsp; <a href="daftar_akun.php" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a></td>
                                </tr>
                                <tr>
                                    <td><b>NIK</b></td>
                                    <td>: <?php isset($_SESSION['nik'])  ?  print($_SESSION['nik']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nama</b></td>
                                    <td>: <?php isset($_SESSION['full_name'])  ?  print($_SESSION['full_name']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nama Panggilan</b></td>
                                    <td>: <?php isset($_SESSION['nick_name'])  ?  print($_SESSION['nick_name']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>TTL</b></td>
                                    <td>: <?php isset($_SESSION['birth_place'])  ?  print($_SESSION['birth_place']) : ""; ?>, <?php isset($_SESSION['birth_date'])  ?  print($_SESSION['birth_date']) : "2009-01-01"; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Jenis Kelamin</b></td>
                                    <td>: <?php isset($_SESSION['gender']) && $_SESSION['gender'] == "L" ? print("Laki-laki") : print("Perempuan") ?></td>
                                </tr>
                                <tr>
                                    <td><b>No. Telp</b></td>
                                    <td>: <?php isset($_SESSION['telp_magang'])  ?  print($_SESSION['telp_magang']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Alamat</b></td>
                                    <td>: <?php isset($_SESSION['alamat'])  ?  print($_SESSION['alamat']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><br><b>Data Usul Magang</b><br><br><b>Nama Asal Akademik (SMK / Kampus)</b></td>
                                    <td><br><br><br>: <?php isset($_SESSION['nama_akademik'])  ?  print($_SESSION['nama_akademik']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Jurusan</b></td>
                                    <td>: <?php isset($_SESSION['jurusan_akademik'])  ?  print($_SESSION['jurusan_akademik']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Alamat Asal Akademik</b></td>
                                    <td>: <?php isset($_SESSION['alamat_akademik'])  ?  print($_SESSION['alamat_akademik']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Dinas-Bidang Tujuan</b></td>
                                    <?php $sql = $conn->query("SELECT * FROM dinas where Id = $_SESSION[id_dinas]");
                                    $data = $sql->fetch_assoc();
                                    ?>
                                    <td>: <?php isset($_SESSION['id_dinas']) && $_SESSION['id_dinas'] == $data['Id'] ? print($data['nama_dinas']) : "" ?></td>

                                </tr>
                                <tr>
                                    <td><b>Tanggal Masuk</b></td>
                                    <td>: <?php isset($_SESSION['tgl_masuk'])  ?  print($_SESSION['tgl_masuk']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal Keluar</b></td>
                                    <td>: <?php isset($_SESSION['tgl_keluar'])  ?  print($_SESSION['tgl_keluar']) : ""; ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <a href="daftar_data_orangtua.php" class="btn btn-primary pull-right" style="margin-top: 30px;"><i class="fa fa-pencil"></i> Edit Data</a>

                        <h3><b>Data Orangtua</b></h3>
                        <table class="table table-hover">

                            <tbody>
                                <tr>
                                    <td><b>Nama Ayah</b></td>
                                    <td>: <?php isset($_SESSION['father_name'])  ?  print($_SESSION['father_name']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>TTL</b></td>
                                    <td>: <?php isset($_SESSION['birth_place_father'])  ?  print($_SESSION['birth_place_father']) : ""; ?>, <?php isset($_SESSION['birth_date_father'])  ?  print($_SESSION['birth_date_father']) : "1980-01-01"; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Pekerjaan</b></td>
                                    <td>: <?php isset($_SESSION['father_job'])  ?  print($_SESSION['father_job']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Telp Ayah</b></td>
                                    <td>: <?php isset($_SESSION['telp_ayah'])  ?  print($_SESSION['telp_ayah']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nama Ibu</b></td>
                                    <td>: <?php isset($_SESSION['mother_name'])  ?  print($_SESSION['mother_name']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>TTL</b></td>
                                    <td>: <?php isset($_SESSION['birth_place_mother'])  ?  print($_SESSION['birth_place_mother']) : ""; ?>, <?php isset($_SESSION['birth_date_mother'])  ?  print($_SESSION['birth_date_mother']) : "1980-01-01"; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Pekerjaan</b></td>
                                    <td>: <?php isset($_SESSION['mother_job'])  ?  print($_SESSION['mother_job']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Telp Ibu</b></td>
                                    <td>: <?php isset($_SESSION['telp'])  ?  print($_SESSION['telp']) : ""; ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <p style="font-size: 18pt; padding-top: 18px;">Anda yakin data diatas benar?</p>
                            </div>
                            <div class="col-md-6">
                                <a href="proses_simpan_pendaftaran.php" class="btn btn-primary pull-right"> Yakin, kirim data pendaftaran <i class="fa fa-check"></i></a>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>