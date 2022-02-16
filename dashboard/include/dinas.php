<h1>Dinas - Bidang</h1>

<?php
if (isset($_SESSION['message'])) {
	echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Berhasil!</strong> " . $_SESSION['message'] . "
    </div>";
}
?>

<div class="row">
	<div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
		<div class="card" style="margin-top: 50px">
			<div class="card-header" data-background-color="gb">
				<h4 class="title"><b>Dinas - Bidang</b></h4>
				<p class="category">Daftar Dinas - Bidang</p>
			</div>
			<div class="card-content">
				<a href="index.php?page=11" class="btn btn-primary btn-md pull-right"><i class="fa fa-plus"></i> Tambah Dinas</a>
				<h3 style="overflow: hidden;"><b>Data Dinas</b></h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<td><b>No</b></td>
							<td><b>Nama Dinas</b></td>
							<td><b>Nama Bidang</b></td>
							<td><b>Aksi</b></td>
						</tr>
					</thead>
					<tbody>

						<?php

						$query = "SELECT * FROM dinas";

						$exec  = mysqli_query($conn, $query);

						if ($exec) {
							$count = mysqli_num_rows($exec);
							if ($count > 0) {
								$no = 0;
								while ($rows = mysqli_fetch_array($exec)) {


						?>
									<tr>
										<td><?php echo ++$no; ?></td>
										<td><?php echo $rows['nama_dinas'] ?></td>
										<td><?php echo $rows['nama_bidang'] ?></td>
										<td>
											<a href="index.php?page=12&id=<?php echo $rows['Id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
											<a href="include/hapus_dinas.php?id=<?php echo $rows['Id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
								<?php
								}
							} else {
								?>
								<tr>
									<td colspan="6" align="center">
										<h4><b>Kosong</b></h4>
									</td>
								</tr>
						<?php
							}
						} else {
							echo mysqli_error($conn);
						}

						?>


					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>

<?php

unset($_SESSION['message']);

?>