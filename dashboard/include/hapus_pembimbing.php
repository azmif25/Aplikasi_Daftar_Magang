<?php  

session_start();
include '../../koneksi/koneksi.php';

if (isset($_GET['id'])) {
	
	$id 		= 	$_GET['id'];

	$query		= 	"DELETE FROM pembimbing WHERE Id = '$id'";

	$exec 		= 	mysqli_query($conn, $query);

	if ($exec) {
		$_SESSION['message'] 	= 	"Hapus data Pembimbing";
		echo '<script>window.location="../index.php?page=25"</script>';
	}
}
