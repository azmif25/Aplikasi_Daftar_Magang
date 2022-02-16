<h2>Profile</h2>

<div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
    <div class="card" style="margin-top: 50px">
        <div class="card-header" data-background-color="gb">
            <h4 class="title"><b>Biodata Pendaftar</b></h4>
            <p class="category">Periksan data anda dibawah, pastikan sudah benar</p>
        </div>
        <div class="card-content table-responsive">

            <h3 style="overflow: hidden;"><b>Data Anak Magang</b></h3>
            <table class="table table-hover">

                <tbody>
                    <tr>
                        <td><b>Email</b></td>
                        <td>: <?php echo $email; ?> </td>
                    </tr>
                    <tr>
                        <td><b>Nama</b></td>
                        <td>: <?php echo $nama; ?></td>
                    </tr>
                    <tr>
                        <td><b>Nama Panggilan</b></td>
                        <td>: <?php echo $nama_panggilan;; ?></td>
                    </tr>
                    <tr>
                        <td><b>TTL</b></td>
                        <td>: <?php echo $tempat_lahir . ", " . $tanggal_lahir;; ?>, <?php isset($_SESSION['birth_date'])  ?  print($_SESSION['birth_date']) : "2009-01-01"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Jenis Kelamin</b></td>
                        <td>: <?php echo $jenis_kelamin; ?></td>
                    </tr>

                    <tr>
                        <td><b>No. Telepon</b></td>
                        <td>: <?php echo $telepon; ?></td>
                    </tr>

                    <tr>
                        <td><b>Alamat</b></td>
                        <td>: <?php echo $alamat; ?></td>
                    </tr>
                </tbody>
            </table>

            <h3 style="overflow: hidden;"><b>Data Usul Magang</b></h3>
            <table class="table table-hover">

                <tbody>
                    <tr>
                        <td><b>Nama Asal Akademik(SMK / Kampus)</b></td>
                        <td>: <?php echo $nama_akademik; ?> </td>
                    </tr>
                    <tr>
                        <td><b>Jurusan</b></td>
                        <td>: <?php echo $jurusan_akademik; ?></td>
                    </tr>
                    <tr>
                        <td><b>Alamat</b></td>
                        <td>: <?php echo $alamat_akademik;; ?></td>
                    </tr>
                    <tr>
                        <td><b>Dinas - Bidang Tujuan</b></td>
                        <?php $sql = $conn->query("SELECT * FROM dinas where Id = $id_dinas");
                        $data = $sql->fetch_assoc();
                        ?>
                        <td>: <?php echo $data['nama_dinas']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Tanggal Masuk</b></td>
                        <td>: <?php echo $tgl_masuk; ?></td>
                    </tr>
                    <tr>
                        <td><b>Tanggal Keluar</b></td>
                        <td>: <?php echo $tgl_keluar; ?></td>
                    </tr>
                </tbody>
            </table>


            <h3><b>Data Orangtua</b></h3>
            <table class="table table-hover">

                <tbody>
                    <tr>
                        <td><b>Nama Ayah</b></td>
                        <td>: <?php echo $nama_ayah;; ?></td>
                    </tr>
                    <tr>
                        <td><b>TTL</b></td>
                        <td>: <?php echo $tempat_lahir_ayah . ", " . $tanggal_lahir_ayah; ?></td>
                    </tr>
                    <tr>
                        <td><b>Pekerjaan</b></td>
                        <td>: <?php echo $pekerjaan_ayah; ?></td>
                    </tr>

                    <tr>
                        <td><b>No. Telepon</b></td>
                        <td>: <?php echo $telp_ayah; ?></td>
                    </tr>
                    <tr>
                        <td><b>Nama Ibu</b></td>
                        <td>: <?php echo $nama_ibu;; ?></td>
                    </tr>
                    <tr>
                        <td><b>TTL</b></td>
                        <td>: <?php echo $tempat_lahir_ibu . ", " . $tanggal_lahir_ibu; ?></td>
                    </tr>
                    <tr>
                    <tr>
                        <td><b>Pekerjaan</b></td>
                        <td>: <?php echo $pekerjaan_ibu; ?></td>
                    </tr>
                    <tr>
                        <td><b>No. Telepon</b></td>
                        <td>: <?php echo $telp_ibu; ?></td>
                    </tr>
                </tbody>
            </table>