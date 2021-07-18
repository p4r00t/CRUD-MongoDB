<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>DATA KARANTINA WARGA</title>
        <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <br>
            <center><h2>DATA KARANTINA WARGA POSITIF COVID-19 KEC. WATES</h2></center>
            <a href="tambah.php" class="btn btn-success">Tambah Data</a>
            <?php
                if(isset($_SESSION['success'])){
                    echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
                }
            ?>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Tanggal Keluar</th>
                        <th scope="col">Edit Data</th>
                    </tr>
                </thead>

                <?php
                    require 'koneksi.php';
                    $covid = $collection->find();
                    foreach ($covid as $cvd){
                        echo "<tr>";
                        echo "<th scope='row'>".$cvd->Nama."</th>";
                        echo "<td>".$cvd->Alamat."</td>";
                        echo "<td>".$cvd->Masuk."</td>";
                        echo "<td>".$cvd->Keluar."</td>";
                        echo "<td>";
                        echo "<a href = 'edit.php?id=".$cvd->_id."'class='btn btn-primary'>Edit</a>";
                        echo "<a href = 'hapus.php?id=".$cvd->_id."'class='btn btn-danger'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </body>
</html>