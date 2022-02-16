<?php

$queryAkun         =    "SELECT * FROM akun WHERE id_user=$ida";
$queryDaftar    =    "SELECT * FROM pendaftaran WHERE id=$idd";
$queryDetail    =     "SELECT * FROM detail_pendaftaran WHERE id_user=$idd";

$execAkun        = mysqli_query($conn, $queryAkun);
$execDaftar        = mysqli_query($conn, $queryDaftar);
$execDetail        = mysqli_query($conn, $queryDetail);

$akun             = array();

if ($execAkun && $execDaftar && $execDetail) {
    $akun         = mysqli_fetch_array($execAkun);
    $daftar     = mysqli_fetch_array($execDaftar);
    $detail     = mysqli_fetch_array($execDetail);
} else {
    echo mysqli_error($conn);
}

?>


<h2>Detail Pendaftaran</h2>

<div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
    <div class="card" style="margin-top: 50px">
        <div class="card-header" data-background-color="gb">
            <h4 class="title"><b>Biodata Pendaftar</b></h4>
            <p class="category">Periksan data Peserta dibawah, pastikan sudah benar</p>
        </div>
        <div class="card-content table-responsive">

            <h3 style="overflow: hidden;"><b>Data Anak Magang</b></h3>
            <table class="table table-hover">

                <tbody>
                    <tr>
                        <td><b>NIK</b></td>
                        <td>: <?php echo $daftar['nik']; ?> </td>
                    </tr>
                    <tr>
                        <td><b>Nama</b></td>
                        <td>: <?php echo $daftar['nama']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Nama Panggilan</b></td>
                        <td>: <?php echo $daftar['nama_panggilan'];; ?></td>
                    </tr>
                    <tr>
                        <td><b>TTL</b></td>
                        <td>: <?php echo $daftar['tempat_lahir'] . ", " . $daftar['tanggal_lahir'];; ?></td>
                    </tr>
                    <tr>
                        <td><b>Jenis Kelamin</b></td>
                        <td>: <?php echo $daftar['jenis_kelamin']; ?></td>
                    </tr>

                    <tr>
                        <td><b>No. Telepon</b></td>
                        <td>: <?php echo $daftar['telepon']; ?></td>
                    </tr>

                    <tr>
                        <td><b>Alamat</b></td>
                        <td>: <?php echo $daftar['alamat']; ?></td>
                    </tr>
                </tbody>
            </table>


            <h3 style="overflow: hidden;"><b>Data Usul Magang</b></h3>
            <table class="table table-hover">

                <tbody>
                    <tr>
                        <td><b>Nama Asal Akademik</b></td>
                        <td>: <?php echo $daftar['nama_akademik']; ?> </td>
                    </tr>
                    <tr>
                        <td><b>Jurusan</b></td>
                        <td>: <?php echo $daftar['jurusan_akademik']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Alamat Akademik</b></td>
                        <td>: <?php echo $daftar['alamat_akademik'];; ?></td>
                    </tr>
                    <?php $sql = $conn->query("SELECT * FROM dinas where Id = $daftar[id_dinas]");
                    $data = $sql->fetch_assoc();
                    ?>
                    <tr>
                        <td><b>Dinas - Bidang Tujuan</b></td>
                        <td>: <b><?php echo $data['nama_dinas']; ?></b> | <?php echo $data['nama_bidang']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Tanggal Masuk</b></td>
                        <td>: <?php echo $daftar['tgl_masuk']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Tanggal Keluar</b></td>
                        <td>: <?php echo $daftar['tgl_keluar']; ?></td>
                    </tr>
                </tbody>
            </table>


            <h3><b>Data Orangtua</b></h3>
            <table class="table table-hover">

                <tbody>
                    <tr>
                        <td><b>Nama Ayah</b></td>
                        <td>: <?php echo $daftar['nama_ayah']; ?></td>
                    </tr>
                    <tr>
                        <td><b>TTL</b></td>
                        <td>: <?php echo $daftar['tempat_lahir_ayah'] . ", " . $daftar['tanggal_lahir_ayah']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Pekerjaan</b></td>
                        <td>: <?php echo $daftar['pekerjaan_ayah']; ?></td>
                    </tr>
                    <tr>
                        <td><b>No. Telepon Ayah</b></td>
                        <td>: <?php echo $daftar['telp_ayah']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Nama Ibu</b></td>
                        <td>: <?php echo $daftar['nama_ibu']; ?></td>
                    </tr>
                    <tr>
                        <td><b>TTL</b></td>
                        <td>: <?php echo $daftar['tempat_lahir_ibu'] . ", " . $daftar['tanggal_lahir_ibu']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Pekerjaan</b></td>
                        <td>: <?php echo $daftar['pekerjaan_ibu']; ?></td>
                    </tr>
                    <tr>
                        <td><b>No. Telepon Ibu</b></td>
                        <td>: <?php echo $daftar['telp_ibu']; ?></td>
                    </tr>
                </tbody>
            </table>

            <h3><b>Download</b></h3>

            <ol>
                <li>Surat Pengantar Magang Dari SMK / Kampus <a href="<?php echo '../assets/uploads/' . $daftar['upload_surat'];  ?>" title="Download Akte Kelahiran" target="_blank"><i class="fa fa-download"></i></a></li>
                <li>Pas Foto <a href="<?php echo '../assets/uploads/' . $daftar['upload_foto'];  ?>" title="Download Akte Kelahiran" target="_blank"><i class="fa fa-download"></i></a></li>
                <!-- <li>Foto Anak <a href="<?php echo '../assets/uploads/' . $daftar['foto_anak'];  ?>" title="Download Akte Kelahiran"><i class="fa fa-download"></i></a></li>
                <li>Foto Keluarga <a href="<?php echo '../assets/uploads/' . $daftar['foto_keluarga'];  ?>" title="Download Akte Kelahiran"><i class="fa fa-download"></i></a></li> -->
            </ol>

            <hr>
            <h3>Lakukan Konfirmasi Pendaftaran?</h3>
            <a href="index.php?page=7" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>