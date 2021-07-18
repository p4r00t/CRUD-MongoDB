<?php session_start();
    if(isset($_POST['submit'])){
        require 'koneksi.php';
        $insertOneResult = $collection->insertOne([
            'Nama' => $_POST['Nama'],
            'Alamat' => $_POST['Alamat'],
            'Masuk' => $_POST['Masuk'],
        ]);
        $_SESSION['success']="Data Warga Berhasil di Tambahkan";
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>DATA KARANTINA WARGA</title>
        <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    </head>"

    <body>
        <div class="container">
            <br>
            <center><h2>TAMBAH DATA WARGA KARANTINA</h2></center>
            <a href="index.php" class="btn btn-primary">Kembali</a>
            <form method="POST">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input type="text" class="form-control" name="Nama" required="" placeholder="Nama Warga">
                    <strong>Alamat:</strong>
                    <input type="text" class="form-control" name="Alamat" required="" placeholder="Alamat Warga">
                    <strong>Tanggal Masuk:</strong>
                    <input type="text" class="form-control" name="Masuk" required="" placeholder="Tanggal Masuk Karantina">
                    <br>
                    <button type="submit" name="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </body>
</html>