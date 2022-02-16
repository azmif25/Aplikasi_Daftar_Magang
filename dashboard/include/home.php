<h2>Selamat Datang, <?php $role == "Admin" ?  print($nama_admin) : print($nama); ?></h2>
<?php
if ($role == 'Admin') {
?>
    <!-- <div class="container"> -->
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="gb">
                    <i class="material-icons">info_outline</i>
                </div>
                <div class="card-content">
                    <p class="category"><b>Pendaftaran Yang Belum DiKonfirmasi</b></p>
                    <h3 class="title"><?php
                                        $query      = "SELECT * FROM pendaftaran JOIN detail_pendaftaran ON detail_pendaftaran.id_user = pendaftaran.Id WHERE detail_pendaftaran.status_pendaftaran = 0 AND pendaftaran.upload_surat IS NOT NULL";
                                        $exec       = mysqli_query($conn, $query);
                                        $rows = mysqli_num_rows($exec);
                                        echo $rows;
                                        ?></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">date_range</i> <a href="index.php?page=7">More Info</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
<?php
} else {
?>
    <div class="row text-center">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <h4>Status Pendaftaran <?php print($nama_panggilan) ?></h4>
                </div>
                <div class="card-content">
                    <?php $sql = $conn->query("SELECT * FROM pembimbing where Id = $id_pembimbing");
                    $data = $sql->fetch_assoc();
                    ?>
                    <!-- <p class="category">Revenue</p> -->
                    <?php if ($status_pendaftaran == 0) {
                        echo '<h3><b>Menunggu</b></h3>';
                    } elseif ($status_pendaftaran == 1) {
                        echo '<h3><b>Di Terima Magang</b></h3>';
                        echo '<h5>Pembimbing Anda adalah ' . $data['nama_pembimbing'] . '</h5>';
                    } else {
                        echo '<h3><b>Di Tolak</b></h3>';
                    } ?>
                    <h3 class="title"></h3>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
<?php
}
?>