<?php
require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MYSQL Prepared Statement</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Pasien Onew Medical Center</h1>
                <a href="add_dbonewmc.php" class="btn btn-primary">Tambahkan Data Pasien Baru</a>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Pekerjaan</th>
                            <th>Keterangan</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = $mysqli->prepare("SELECT `id_Pasien`, `Nama_Pasien`, `Jenis_Kelamin`, `Agama`, `Alamat`, `Pekerjaan`, `Keterangan`, `Tindakan` FROM `data_pasien_mc_onew` ORDER BY `Nama_Pasien` ASC");
                        $stmt->execute();
                        $stmt->store_result();
                        if( $stmt->num_rows() > 0 ) {
                            $stmt->bind_result($id_Pasien, $Nama_Pasien, $Jenis_Kelamin, $Agama, $Alamat, $Pekerjaan, $Keterangan, $Tindakan);
                            while( $stmt->fetch() ) {
                        ?>
                        <tr>
                            <td><?=$Nama_Pasien?></td>
                            <td><?=$Jenis_Kelamin?></td>
                            <td><?=$Agama?></td>
                            <td><?=$Alamat?></td>
                            <td><?=$Pekerjaan?></td>
                            <td><?=$Keterangan?></td>
                            <td><?=$Tindakan?></td>
                            <td></td>
                        </tr>
                        <?php } ?>
                        <?php } else {?>
                        <tr>
                            <th colspan="S">Tidak Ada Data Pasien Ditambahkan></th>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
