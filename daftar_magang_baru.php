<?php
//start the session
session_start();
include "koneksi/koneksi.php";
$redirect = "";

if (isset($_SESSION['is_data_student_exist'])) {
    $redirect = "<script> window.location='daftar_syarat.php'; </script>";
} else {
    $redirect = "<script> window.location='daftar_data_orangtua.php'; </script>";
}

//check if button next is clicked
if (isset($_POST['submit'])) {

    //set all name attr and value to created variable
    foreach ($_POST as $key => $val) {
        ${$key} = $val;
        $_SESSION['' . $key . ''] = $val;
    }

    //check if session is not empty, then redirect to daftar_data_orangtua.php
    if (!empty($_SESSION)) {
        echo $redirect;
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
                        <h4 class="title"><b>Biodata Diri</b></h4>
                        <p class="category">Isi Form pendaftaran dengan benar</p>
                    </div>
                    <div class="card-content">
                        <form method="post" action="">
                            <fieldset class="the-fieldset">
                                <legend class="the-legend"><b>Biodata Lengkap</b></legend>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">NIK</label>
                                            <input type="text" class="form-control" name="nik" placeholder="Masukan NIK..." required autofocus value="<?php isset($_SESSION['nik'])  ?  print($_SESSION['nik']) : ""; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="full_name" placeholder="Masukan Nama Lengkap..." required autofocus value="<?php isset($_SESSION['full_name'])  ?  print($_SESSION['full_name']) : ""; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nama Panggilan</label>
                                            <input type="text" class="form-control" name="nick_name" placeholder="Masukan Nama Panggilan..." required autofocus value="<?php isset($_SESSION['nick_name'])  ?  print($_SESSION['nick_name']) : ""; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tempat lahir</label>
                                            <input type="text" class="form-control" name="birth_place" placeholder="Masukan Tempat Lahir..." required autofocus value="<?php isset($_SESSION['birth_place'])  ?  print($_SESSION['birth_place']) : ""; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tanggal lahir</label>
                                            <input type="date" class="form-control" name="birth_date" value="<?php isset($_SESSION['birth_date'])  ?  print($_SESSION['birth_date']) : print("1998-01-01"); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Jenis Kelamin</label>
                                            <select name="gender" class="form-control">
                                                <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>

                                                <option value="L" <?php isset($_SESSION['gender']) && $_SESSION['gender'] == "L" ? print("selected") : "" ?>>Laki-laki</option>
                                                <option value="P" <?php isset($_SESSION['gender']) && $_SESSION['gender'] == "P" ? print("selected") : "" ?>>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">No. Telp</label>
                                            <input type="text" class="form-control" name="telp_magang" placeholder="Masukan No. Telepon / WA..." required autofocus value="<?php isset($_SESSION['telp_magang'])  ?  print($_SESSION['telp_magang']) : ""; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Alamat</label>
                                            <textarea class="form-control" name="alamat" cols="30" rows="2" placeholder="Masukan Alamat Lengkap..." required autofocus><?php isset($_SESSION['alamat'])  ?  print($_SESSION['alamat']) : ""; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="the-fieldset">
                                <legend class="the-legend"><b>Data Usul Magang</b></legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nama Asal Akademik (SMK / Kampus)</label>
                                            <input type="text" class="form-control" name="nama_akademik" placeholder="Masukan Nama Akademik..." required autofocus value="<?php isset($_SESSION['nama_akademik'])  ?  print($_SESSION['nama_akademik']) : ""; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Jurusan</label>
                                            <input type="text" class="form-control" name="jurusan_akademik" placeholder="Masukan Nama Jurusan..." required autofocus value="<?php isset($_SESSION['jurusan_akademik'])  ?  print($_SESSION['jurusan_akademik']) : ""; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Alamat Asal Akademik (SMK / Kampus)</label>
                                            <textarea class="form-control" name="alamat_akademik" cols="30" rows="2" placeholder="Masukan Alamat Lengkap..." required autofocus><?php isset($_SESSION['alamat_akademik'])  ?  print($_SESSION['alamat_akademik']) : ""; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="" class="control-label">Dinas & Bidang Yang Tuju</label>
                                        <select name="id_dinas" class="form-control">
                                            <option value="">Pilih *Dinas-Bidang</option>
                                            <?php
                                            $sql = $conn->query("SELECT * FROM dinas");
                                            while ($data = $sql->fetch_array()) {
                                            ?>
                                                <option value="<?php echo $data['Id']; ?>" <?php isset($_SESSION['id_dinas']) && $_SESSION['id_dinas'] == $data['Id'] ? print("selected") : "" ?>><?php echo $data['nama_dinas']; ?> | <?php echo $data['nama_bidang']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tanggal Masuk Magang</label>
                                            <input type="date" class="form-control" name="tgl_masuk" value="<?php isset($_SESSION['tgl_masuk'])  ?  print($_SESSION['tgl_masuk']) : print(date('Y-m-d')); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tanggal Keluar Magang</label>
                                            <input type="date" class="form-control" name="tgl_keluar" value="<?php isset($_SESSION['tgl_keluar'])  ?  print($_SESSION['tgl_keluar']) : print(date('Y-m-d', strtotime('+1 month'))); ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                            <?php
                            if (isset($_SESSION['is_data_student_exist'])) {
                            ?>
                                <button type="submit" name="submit" class="btn btn-primary pull-right">Kembali <i class="fa fa-arrow-right"></i></button>
                            <?php
                            } else {
                            ?>
                                <button type="submit" name="submit" class="btn btn-primary pull-right">Lanjut <i class="fa fa-arrow-right"></i></button>
                            <?php
                            }
                            ?>


                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>