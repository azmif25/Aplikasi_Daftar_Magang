<?php

include '../koneksi/koneksi.php';

if (isset($_POST['upload'])) {
    $targetfolderBase   = "../assets/uploads/";

    $fileNameFotoAnak   = date("h-m-s") . basename($_FILES['pasfoto']['name']);
    $fileNameFotoKeluarga   = date("h-m-s") . basename($_FILES['foto_keluarga']['name']);

    $targetfolder   = $targetfolderBase . $fileNameFotoAnak;
    $targetfolder2  = $targetfolderBase . $fileNameFotoKeluarga;


    $ok = 1;

    $file_type = $_FILES['pasfoto']['type'];
    $file_type2 = $_FILES['foto_keluarga']['type'];


    if ($file_type == "image/jpeg" || $file_type == "image/png" || $file_type == "application/pdf") {

        if (move_uploaded_file($_FILES['pasfoto']['tmp_name'], $targetfolder)) {

            $query  = "UPDATE pendaftaran SET upload_foto='$fileNameFotoAnak' WHERE id=$id";

            $exec   = mysqli_query($conn, $query);

            if ($exec) {
                echo "<div class='alert alert-success alert-dismissable'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
              <strong>Berhasil!</strong> Upload Pas Foto(PDF, JPEG, PNG).
            </div>";
            }
        } else {

            echo "<div class='alert alert-danger alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Gagal!</strong> Upload Pas Foto(PDF, JPEG, PNG).
        </div>";
        }
    } else {

        echo "<div class='alert alert-danger alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Gagal!</strong> Upload Pas Foto harus format(.PDF, JPEG, PNG).
        </div>";
    }
}

?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="gb">
                <h4 class="title"><b>Upload Pas Foto (JPG/PNG)</b></h4>
                <p class="category">Upload dengan format yang benar(PDF, JPEG, PNG)</p>
                <a href="index.php?page=4" class="btn btn-primary btn-md pull-right" style="margin-top: -40px;"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-content">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">


                        <div class="form-group floating-label" style="margin-left: 20px;">
                            <label class="col-sm-12">Pas Foto (PDF, JPEG, PNG) : </label>
                            <label class="btn btn-warning" for="my-file-selector">
                                <input id="my-file-selector" name="pasfoto" type="file" style="display:none" onchange="$('#upload-file-info').html(this.files[0].name)">
                                Upload Pas Foto (PDF, JPEG, PNG)
                            </label>
                            <span class='label label-info' id="upload-file-info"></span>
                        </div>

                    </div>

                    <!-- <div class="row">
                        <div class="form-group floating-label" style="margin-left: 20px;">
                            <label class="col-sm-12">Kartu Keluarga(PDF, JPEG, PNG) : </label>
                            <label class="btn btn-primary" for="my-file-selector2">
                                <input id="my-file-selector2" name="foto_keluarga" type="file" style="display:none" 
                                onchange="$('#upload-file-info2').html(this.files[0].name)">
                                Upload Foto Kartu Keluarga(PDF, JPEG, PNG)
                            </label>
                            <span class='label label-info' id="upload-file-info2"></span>
                        </div>
                    </div> -->

                    <hr>

                    <button type="submit" name="upload" class="btn btn-primary blue pull-right"><i class="fa fa-upload"></i> Upload File</button>
                </form>
            </div>
        </div>
    </div>
</div>