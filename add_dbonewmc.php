<?php
require 'connect.php';

// If button save clicks
if( isset( $_POST['btnSubmit'] ) )
{

    // Fetch input $_POST
    $Nama_Pasien = $mysqli->real_escape_string( $_POST['Nama_Pasien'] );
    $Jenis_Kelamin = $mysqli->real_escape_string( $_POST['Jenis_Kelamin'] );
    $Agama = $mysqli->real_escape_string( $_POST['Agama'] );
    $Alamat = $mysqli->real_escape_string( $_POST['Alamat'] );
    $Pekerjaan = $mysqli->real_escape_string( $_POST['Pekerjaan'] );
    $Keterangan = $mysqli->real_escape_String( $_POST[ 'Keterangan'] );
    $Tindakan = $mysqli->real_escape_string( $_POST['Tindakan'] );
     
    // Prepared Statement
    $stmt = $mysqli->prepare("INSERT INTO `data_pasien_mc_onew` (`Nama_Pasien`, `Jenis_Kelamin`, `Agama`, `Alamat`, `Pekerjaan`, `Keterangan`, `Tindakan`) VALUE(?, ?, ?, ?, ?, ?, ?)");

    // Bind params
    // s - string, d-double, i-integer
    $stmt->bind_param("sssssss", $Nama_Pasien, $Jenis_Kelamin, $Agama, $Alamat, $Pekerjaan, $Keterangan, $Tindakan);

    // Execute
    $result = $stmt->execute();

    if( $result ) {
        $alert_message = "Data Pasien Berhasil Direkam.";
    } else {
        $alert_message = "Data Pasien Gagal Dimasukkan. Coba Lagi.";
    }

    // Close prepared statement
    $stmt->close();

    // Close database connection
    $mysqli->close();

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MYSQL Prepared Statement - Tambahkan Data Pasien Baru</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Tambahkan Data Pasien Baru</h1>

                <?php
                if( isset( $alert_message ) AND ! empty($alert_message) ) {
                    echo '<div class="alert alert-info">' . $alert_message . '</div>';
                }
                ?>

                <form method="post">

                    <center>
                        <div class="form-group row">
                            <label for="Nama_Pasien" class="col-md-3 col-form-label text-right">Nama Pasien</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="Nama_Pasien" id="Nama_Pasien" placeholder="Masukkan Nama Pasien" required />
                            </div>
                        </div>
                    </center>

                    <center>
                        <div class="form=group row">
                            <label for="Jenis_Kelamin" class="col-md-3 col-form-label text-right">Jenis Kelamin</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="Jenis_Kelamin" id="Jenis_Kelamin" placeholder="Masukkan Jenis Kelamin" required />
                            </div>
                        </div>
                    </center>

                    <center>
                        <div class="form=group row">
                            <label for="Agama" class="col-md-3 col-form-label text-right">Agama</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="Agama" id="Agama" placeholder="Masukkan Agama" required />
                            </div>
                        </div>
                    </center>

                    <center>
                        <div class="form=group row">
                            <label for="Alamat" class="col-md-3 col-form-label text-right">Alamat</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="Alamat" id="Alamat" placeholder="Masukkan Alamat" required />
                            </div>
                        </div>
                    </center>

                    <center>
                        <div class="form=group row">
                            <label for="Pekerjaan" class="col-md-3 col-form-label text-right">Pekerjaan</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="Pekerjaan" id="Pekerjaan" placeholder="Masukkan Pekerjaan" required />
                            </div>
                        </div>
                    </center>

                    <center>
                        <div class="form-group row">
                            <label for="Keterangna" class="col-md-3 col-form-label text-right">Keterangan</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="Keterangan" id="Keterangan" placeholder="Masukkan Keterangan" required />
                            </div>
                        </div>
                    </center>

                    <center>
                        <div class="form=group row">
                            <label for="Tindakan" class="col-md-3 col-form-label text-right">Tindakan</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="Tindakan" id="Tindakan" placeholder="Masukkan Tindakan" required />
                            </div>
                        </div>
                    </center>

                    <center>
                        <button class="btn btn-succes" type="submit" name="btnSubmit">Save Data Pasien</button>
                        <a href="index.php" class="btn btn-info">Kembali Ke Data Pasien</a>
                    </center>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
