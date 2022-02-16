<h1>Tambah Dinas</h1>

<?php

// $query = "select * from guru order by nip desc limit 1";
// $baris = mysqli_query($conn, $query);
// if ($baris) {
// 	if (mysqli_num_rows($baris) > 0) {
// 		$auto = mysqli_fetch_array($baris);
// 		$kode = $auto['nip'];
// 		$baru = substr($kode, 3, 7);
// 		//$nilai=$baru+1;
// 		$nol = (int)$baru;
// 	} else {
// 		$nol = 0;
// 	}
// 	$nol = $nol + 1;
// 	$nol2 = "";
// 	$nilai = 4 - strlen($nol);
// 	for ($i = 1; $i <= $nilai; $i++) {
// 		$nol2 = $nol2 . "0";
// 	}

// 	$kode2 = "117" . $nol2 . $nol;
// } else {
// 	echo mysqli_error();
// }


if (isset($_POST['submit'])) {

	$_SESSION['message'] = "";

	$valid = true;
	$err   = array();

	foreach ($_POST as $key => $val) {
		${$key} = $val;
		$_SESSION['' . $key . ''] = $val;
	}

	if ($nama_dinas == "") {
		array_push($err, "nama dinas tidak boleh kosong");
		$valid = false;
	}

	if ($nama_bidang == "") {
		array_push($err, "nama bidang tidak boleh kosong");
		$valid = false;
	}

	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	} else {
		$query		=	"INSERT INTO dinas VALUES(null, '$nama_dinas', '$nama_bidang')";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil tambah dinas";
			echo '<script>window.location = "index.php?page=26"</script>';
		} else {
			echo mysqli_error($conn);
		}
	}
} else {
	unset($_SESSION['nama_dinas']);
	unset($_SESSION['nama_bidang']);
}
?>

<div class="row">
	<div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
		<div class="card" style="margin-top: 50px">
			<div class="card-header" data-background-color="gb">
				<h4 class="title"><b>Tambah Dinas</b></h4>
				<p class="category">Masukan data Dinas dengan benar</p>
			</div>
			<div class="card-content">
				<a href="index.php?page=26" class="btn btn-primary btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
				<h3 style="overflow: hidden;"><b>Data Dinas</b></h3>

				<form action="" method="post">
					<div class="form-group">
						<label for="nip">Nama Dinas</label>
						<input type="text" class="form-control" name="nama_dinas" value="<?php isset($_SESSION['nama_dinas'])  ?  print($_SESSION['nama_dinas']) : ""; ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama">Nama Bidang</label>
						<input type="text" class="form-control" name="nama_bidang" value="<?php isset($_SESSION['nama_bidang'])  ?  print($_SESSION['nama_bidang']) : ""; ?>">
					</div>


					<button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-warning pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

			</div>
		</div>
	</div>
</div>