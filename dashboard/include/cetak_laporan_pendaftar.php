<?php
ob_start();
include '../../assets/libs/fpdf/fpdf.php';
include '../../koneksi/koneksi.php';
include '../../assets/libs/fpdf/mc_table/mc_table.php';

$id_maintenance = $_GET['id_mnt'];


// Instanciation of inherited class
$pdf = new PDF_MC_Table();
$pdf->AliasNbPages();
$pdf->AddPage();



$pdf->Ln(15);
$pdf->Cell(40, 10, '', 0, 0, 'L');
$pdf->SetFont('TIMES', 'B', 12);
$pdf->Cell(100, 10, 'List Pendaftaran', 1, 1, 'C');
$pdf->Ln();
$pdf->SetFont('TIMES', '', 10);
$pdf->Cell(6, 10, 'No.', 1, 0, 'C');
$pdf->Cell(30, 10, 'Nama', 1, 0, 'C');
$pdf->Cell(5, 10, 'JK', 1, 0, 'C');
$pdf->Cell(25, 10, 'No.Telepon', 1, 0, 'C');
$pdf->Cell(23, 10, 'Tanggal Daftar', 1, 0, 'C');
$pdf->Cell(30, 10, 'Asal Akademik', 1, 0, 'C');
$pdf->Cell(30, 10, 'Jurusan', 1, 0, 'C');
$pdf->Cell(23, 10, 'Tanggal Masuk', 1, 0, 'C');
$pdf->Cell(23, 10, 'Tanggal Keluar', 1, 1, 'C');

$query  =  "SELECT * FROM pendaftaran a, akun b, detail_pendaftaran c WHERE a.Id = c.id_user AND b.id_user = a.Id";
$exec   =  mysqli_query($conn, $query);

$no = 0;

$pdf->SetWidths(array(6, 30, 5, 25, 23, 30, 30, 23, 23));

while ($rows = mysqli_fetch_array($exec)) {
  $pdf->Row(array(++$no, $rows['nama'], $rows['jenis_kelamin'], $rows['telepon'], $rows['tanggal_daftar'], $rows['nama_akademik'], $rows['jurusan_akademik'], $rows['tgl_masuk'], $rows['tgl_keluar']));
}


$pdf->Output();
