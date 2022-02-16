<h1>Tambah Pembimbing</h1>

<?php

// $query = "select * from mapel order by kode_mapel_kegiatan desc limit 1";
// $baris = mysqli_query($conn, $query);
// if ($baris) {
// 	if (mysqli_num_rows($baris) > 0) {
// 		$auto = mysqli_fetch_array($baris);
// 		$kode = $auto['kode_mapel_kegiatan'];
// 		$baru = substr($kode, 2, 4);
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

// 	$kode2 = "P" . $nol2 . $nol;
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

	if ($nama_pembimbing == "") {
		array_push($err, "nama pembimbing tidak boleh kosong");
		$valid = false;
	}


	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	} else {
		$query		=	"INSERT INTO pembimbing VALUES(null, '$nama_pembimbing')";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil tambah pembimbing";
			echo '<script>window.location = "index.php?page=25"</script>';
		} else {
			echo mysqli_error($conn);
		}
	}
} else {
	unset($_SESSION['nama_pembimbing']);
}
?>

<div class="row">
	<div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
		<div class="card" style="margin-top: 50px">
			<div class="card-header" data-background-color="gb">
				<h4 class="title"><b>Tambah Pembimbing</b></h4>
				<p class="category">Masukan data mapel dengan benar</p>
			</div>
			<div class="card-content">
				<a href="index.php?page=25" class="btn btn-primary btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
				<h3 style="overflow: hidden;"><b>Data Pemimbing</b></h3>

				<form action="" method="post">
					<div class="form-group floating-label">
						<label for="nama">Nama Pembimbing</label>
						<input type="text" class="form-control" name="nama_pembimbing" value="<?php isset($_SESSION['nama'])  ?  print($_SESSION['nama']) : ""; ?>">
					</div>



					<button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-warning pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

			</div>
		</div>
	</div>
</div>