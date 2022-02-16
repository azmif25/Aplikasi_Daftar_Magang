<h1>Ubah Data siswa</h1>

<?php
$query 		=	"SELECT * FROM pembimbing where Id = '$id'";

$exec  		= 	mysqli_query($conn, $query);

if ($exec) {
	$data 	= mysqli_fetch_array($exec);
} else {
	echo mysqli_error($conn);
}


if (isset($_POST['submit'])) {

	$_SESSION['message'] = "";

	$valid = true;

	foreach ($_POST as $key => $val) {
		${$key} = $val;
	}

	if ($nama_pembimbing == "") {
		$valid = false;
	}


	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	} else {
		$query		=	"UPDATE pembimbing 
						SET nama_pembimbing = '$nama_pembimbing' 
						WHERE Id='$id'";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil ubah data Pembimbing";
			echo '<script>window.location = "index.php?page=25"</script>';
		} else {
			echo mysqli_error($conn);
		}
	}
}
?>

<div class="row">
	<div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
		<div class="card" style="margin-top: 50px">
			<div class="card-header" data-background-color="gb">
				<h4 class="title"><b>Ubah data Pembimbing</b></h4>
				<p class="category">Masukan data Pembimbing dengan benar</p>
			</div>
			<div class="card-content">
				<a href="index.php?page=25" class="btn btn-primary btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
				<h3 style="overflow: hidden;"><b>Data Pembimbing</b></h3>
				<form action="" method="post">
					<div class="form-group floating-label">
						<label for="nama">Nama Pembimbing</label>
						<input type="text" class="form-control" name="nama_pembimbing" value="<?php echo $data['nama_pembimbing'] ?>">
					</div>

					<button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-warning pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

			</div>
		</div>
	</div>
</div>