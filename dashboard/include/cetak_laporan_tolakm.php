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

if (isset($_POST['tampil'])) {
    $iddin = $_POST['id_dinas'];
    $ambil = $conn->query("SELECT * FROM jadwal JOIN dinas ON jadwal.id_dinas = dinas.Id WHERE jadwal.id_dinas = $iddin ");
    $pecah = $ambil->fetch_array();
    $pdf->Ln(15);
    $pdf->Cell(40, 10, '', 0, 0, 'L');
    $pdf->SetFont('TIMES', 'B', 12);
    $pdf->Cell(110, 5, 'JADWAL', 0, 1, 'C');
    $pdf->Cell(190, 10, '' . $pecah['nama_dinas'] . ' | ' . $pecah['nama_bidang'] . '', 0, 1, 'C');
    $pdf->Ln();
    $pdf->SetFont('TIMES', '', 10);
    $pdf->Cell(10, 10, 'No.', 1, 0, 'C');
    $pdf->Cell(35, 10, 'Senin', 1, 0, 'C');
    $pdf->Cell(35, 10, 'Selasa', 1, 0, 'C');
    $pdf->Cell(35, 10, 'Rabu', 1, 0, 'C');
    $pdf->Cell(35, 10, 'Kamis', 1, 0, 'C');
    $pdf->Cell(35, 10, 'Jum`at', 1, 1, 'C');

    $query  =  "SELECT * FROM jadwal JOIN dinas ON jadwal.id_dinas = dinas.Id WHERE id_dinas = $iddin ";
    $exec   =  mysqli_query($conn, $query);
}
$no = 0;

$pdf->SetWidths(array(10, 35, 35, 35, 35, 35));

while ($rows = mysqli_fetch_array($exec)) {
    $pdf->Row(array(++$no, $rows['senin'], $rows['selasa'], $rows['rabu'], $rows['kamis'], $rows['jumat']));
}


$pdf->Output();
