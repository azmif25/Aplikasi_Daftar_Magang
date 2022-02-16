<h2>Laporan</h2>


<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="gb">
                <h4 class="title"><i class="fa fa-print"></i> <b>Laporan</b></h4>
                <p class="category"></p>
            </div>
            <div class="card-content" style="align-items: center;">


                <style>
                    hr {
                        background: linear-gradient(70deg, #36e3d2, #6c32fc);
                        height: 3px;
                        border: 1px solid blue;
                        border-radius: 5px;
                    }
                </style>

                <form method="POST" action="include/cetak_laporan_terimaday.php" class="form-inline text-center">
                    <div class="form-group mb-2" style="width: 30%;">
                        <label for=""><b style="color: black;">Dari :</b></label>&ensp;
                        <input style="width: 60%;" type="date" name="dari_tanggal" value="<?php echo date("Y-m-d") ?>" class="form-control form-control-sm text-center">
                    </div>
                    <div class="form-group mx-sm-3 mb-2" style="width: 30%;">
                        <label for=""><b style="color: black;">Sampai :</b> </label>&ensp;
                        <input style="width: 60%;" type="date" name="ke_tanggal" value="<?php echo date("Y-m-d") ?>" class="form-control form-control-sm text-center">
                    </div>
                    <!-- <button type="submit" class="btn btn-primary mb-2">Confirm identity</button> -->

                    <button name="tampil" style="height: 30px; margin-top: 30px;" class="btn btn-sm btn-primary mb-2"><i class="fa fa-print"></i> Cetak Laporan DiTerima Magang</button>
                </form>
                <!-- <center><a href="include/cetak_laporan_terimaday.php" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Laporan Diterima Magang Per-Hari</a></center> -->
                <hr>
                <form method="POST" action="include/cetak_laporan_tolakday.php" class="form-inline text-center">
                    <div class="form-group mb-2" style="width: 30%;">
                        <label for=""><b style="color: black;">Dari :</b></label>&ensp;
                        <input style="width: 60%;" type="date" name="dari_tanggal" value="<?php echo date("Y-m-d") ?>" class="form-control form-control-sm text-center">
                    </div>
                    <div class="form-group mx-sm-3 mb-2" style="width: 30%;">
                        <label for=""><b style="color: black;">Sampai :</b> </label>&ensp;
                        <input style="width: 60%;" type="date" name="ke_tanggal" value="<?php echo date("Y-m-d") ?>" class="form-control form-control-sm text-center">
                    </div>
                    <!-- <button type="submit" class="btn btn-primary mb-2">Confirm identity</button> -->

                    <button name="tampil" style="height: 30px; margin-top: 30px;" class="btn btn-sm btn-primary mb-2"><i class="fa fa-print"></i> Cetak Laporan Ditolak Magang</button>
                </form>

                <!-- <center><a href="include/cetak_laporan_tolakday.php" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Laporan Ditolak Magang Per-Hari</a></center> -->
                <hr>
                <form method="POST" action="include/cetak_laporan_tolakm.php" class="form-inline text-center">
                    <div class="form-group mb-2" style="width: 75%;">
                        <label for=""><b style="color: black;">Dinas | Bidang :</b></label>&ensp;
                        <select style="width: 75%;" name="id_dinas" class="form-control form-control-sm text-center" id="change<?php echo $rows['id_daftar'] ?>">
                            <option value="">-- Pilih Dinas | Bidang --</option>
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
                    <!-- <button type="submit" class="btn btn-primary mb-2">Confirm identity</button> -->
                    <button name="tampil" style="height: 30px; margin-top: 30px;" class="btn btn-sm btn-primary mb-2"><i class="fa fa-print"></i> Cetak Jadwal</button>
                </form>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <center><a href="include/cetak_laporan_pendaftar.php" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Cetak Laporan Pendaftar</a></center>
                    </div>
                    <div class="col-md-6">
                        <center><a href="include/cetak_laporan_terimam.php" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Cetak Pembimbing Magang</a></center>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>