<h2>Konfirmasi Pendaftaran</h2>

<?php
if (isset($_SESSION['message'])) {
	echo "<div class='alert alert-success alert-dismissable' id='success-alert'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Berhasil!</strong> Konfirmasi pendaftaran.
    </div>";
}
?>

<div class="row">
	<div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
		<div class="card" style="margin-top: 50px">
			<div class="card-header" data-background-color="gb">
				<h4 class="title"><b>Konfirmasi Pendaftaran</b></h4>
				<p class="category">Lakukan konfirmasi pendaftaran</p>
			</div>
			<div class="card-content">

				<h3 style="overflow: hidden;"><b>Data Pendaftar</b></h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<td><b>No</b></td>
							<td><b>Nama Pendaftar</b></td>
							<td><b>Email</b></td>
							<td><b>Status Pendaftaran</b></td>
							<td><b>Aksi</b></td>
						</tr>
					</thead>
					<tbody>
						<?php
						$query 	= "SELECT a.nama, a.id_dinas, a.id as id_daftar, b.id as id_akun,b.email,d.*,c.* 
				    				FROM pendaftaran a, akun b, detail_pendaftaran c, dinas d 
						    		WHERE a.id=b.id_user 
									AND a.id_dinas=d.id
						    		AND b.role_user=1 
						    		AND c.id_user = a.id
                    				AND a.upload_foto != '' 
                    				AND a.upload_surat != ''";

						$exec 	=	mysqli_query($conn, $query);

						if ($exec) {
							$total	= mysqli_num_rows($exec);
							if ($total > 0) {
								while ($rows = mysqli_fetch_array($exec)) {

									$status = $rows['status_pendaftaran'];


						?>


									<tr>
										<td><?php echo ++$no; ?></td>
										<td><?php echo $rows['nama']; ?></td>
										<td><?php echo $rows['email']; ?></td>
										<td><?php
											// $status == 0 ?
											// 	print("<font color='#e74c3c'>Belum dikonfirmasi</font>") :
											// 	print("<font color='##2ecc71'>Sudah dikonfirmasi</font>");
											if ($status == 1) {
												print("<font color='##2ecc71'>DiTerima</font>");
											} elseif ($status == 2) {
												print("<font color='red'>DiTolak</font>");
											} else {
												print("<font color='#e74c3c'>Belum dikonfirmasi</font>");
											}
											?></td>
										<td>

											<!-- <a href="#id<?php echo $rows['id_daftar'] ?>" class="btn btn-success btn-sm" data-toggle="modal">DiTerima</a> -->
											<a href='#id<?php echo $rows['id_daftar'] ?>' data-toggle='modal' class='btn btn-success btn-sm'>DiTerima</a>
											<!-- <a href="include/proses_konfirmasi_pendaftaran.php?ida=<?php echo $rows['id_akun'] ?>&idd=<?php echo $rows['id_daftar'] ?>&idu=<?php echo $Id ?>" class="btn btn-success btn-sm">Diterima</a> -->


											<div class="modal fade" id="id<?php echo $rows['id_daftar'] ?>" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title text-center" id="myModalLabel"><b>Konfirmasi Pendaftaran</b></h4>
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="text-center"> <?php echo $rows['nama'] ?> </h4>
														</div>
														<div class="modal-body text-center">
															<form method="post" action="./include/proses_konfirmasi_pendaftaran.php">
																<div class="form-group">
																	<label for="">Pembimbing</label>
																	<select name="id_pembimbing" class="form-control text-center" id="" autofocus>
																		<option value="">-- Pilih Pembimbing --</option>
																		<?php
																		$sql = $conn->query("SELECT * FROM pembimbing");
																		while ($data = $sql->fetch_array()) {
																		?>
																			<option value="<?php echo $data['Id']; ?>" <?php isset($_SESSION['id_pembimbing']) && $_SESSION['id_pembimbing'] == $data['Id'] ? print("selected") : "" ?>><?php echo $data['nama_pembimbing']; ?></option>
																		<?php
																		}
																		?>
																	</select>
																</div>
																<fieldset class="form-group">
																	<div class="row">
																		<input type="hidden" name="id" value="<?php echo $rows['Id'] ?>">
																		<input type="hidden" name="idser" value="<?php echo $rows['id_user'] ?>">
																		<input type="hidden" name="id_admin" value="<?php echo $Id ?>">
																		<div class="col-sm-6">
																			<label>Apakah Ingin Mengganti Dinas | Bidang?</label>
																		</div>
																		<div class="col-sm-6">
																			<div class="form-check">
																				<input class="form-check-input" id="tidak<?php echo $rows['id_daftar'] ?>" type="radio" name="status" value="Tidak Layak" checked>
																				<label class="form-check-label">
																					<b>Tidak</b>
																				</label>&ensp; &ensp;&ensp; &ensp;&ensp; &ensp;
																				<input class="form-check-input" id="ya<?php echo $rows['id_daftar'] ?>" type="radio" name="status" value="Layak">
																				<label class="form-check-label">
																					Iya
																				</label>
																			</div>
																			<script>
																				document.getElementById('tidak<?php echo $rows['id_daftar'] ?>').onclick = function() {
																					var disabled = document.getElementById("change<?php echo $rows['id_daftar'] ?>").disabled;
																					var disabled = document.getElementById("iddin<?php echo $rows['id_daftar'] ?>").disabled;
																					if (disabled) {
																						document.getElementById("change<?php echo $rows['id_daftar'] ?>").disabled = true;
																						document.getElementById("iddin<?php echo $rows['id_daftar'] ?>").disabled = false;
																					} else {
																						document.getElementById("change<?php echo $rows['id_daftar'] ?>").disabled = true;
																						document.getElementById("iddin<?php echo $rows['id_daftar'] ?>").disabled = false;
																					}
																				}
																				document.getElementById('ya<?php echo $rows['id_daftar'] ?>').onclick = function() {
																					var disabled = document.getElementById("change<?php echo $rows['id_daftar'] ?>").disabled;
																					var disabled = document.getElementById("iddin<?php echo $rows['id_daftar'] ?>").disabled;
																					if (disabled) {
																						document.getElementById("change<?php echo $rows['id_daftar'] ?>").disabled = false;
																						document.getElementById("iddin<?php echo $rows['id_daftar'] ?>").disabled = true;
																					} else {
																						document.getElementById("change<?php echo $rows['id_daftar'] ?>").disabled = false;
																						document.getElementById("iddin<?php echo $rows['id_daftar'] ?>").disabled = true;
																					}
																				}
																			</script>
																		</div>
																	</div>
																</fieldset>
																<div class="form-group">
																	<label for="">Dinas</label>
																	<input type="hidden" value="<?php echo $rows['id_dinas']; ?>" name="id_dinas" id="iddin<?php echo $rows['id_daftar'] ?>">
																	<select name="id_dinas" class="form-control text-center" id="change<?php echo $rows['id_daftar'] ?>" disabled="true">
																		<option value="<?php echo $rows['id_dinas']; ?>"><?php echo $rows['nama_dinas']; ?> | <?php echo $rows['nama_bidang']; ?></option>
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
														<div class="modal-footer">
															<!-- <input name="proses" type="submit" class="btn btn-info" value="Simpan" /> -->
															<button name="proses" class="btn btn-primary btn-sm">Proses</button>
															</form>
															<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
														</div>
													</div>

												</div>
											</div>

											<a href="include/proses_tolak_pendaftaran.php?ida=<?php echo $rows['id_akun'] ?>&idd=<?php echo $rows['id_daftar'] ?>&idu=<?php echo $Id ?>" class="btn btn-danger btn-sm">Ditolak</a>
											<a href="index.php?page=28&ida=<?php echo $rows['id_akun'] ?>&idd=<?php echo $rows['id_daftar'] ?>" class="btn btn-info btn-sm">Detail</a>
										</td>
									</tr>

						<?php
								}
							} else {
								echo "<td colspan='5' align='center'><h3><b>Belum ada siswa daftar</b></h3></td>";
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