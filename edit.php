<?php session_start();
    require 'koneksi.php';
    if (isset($_GET['id'])) {
        $cvd = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
    }
    if (isset($_POST['submit'])) {
        $collection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
            ['$set' => ['Nama' => $_POST['Nama'], 'Alamat' => $_POST['Alamat'], 'Keluar' => $_POST['Keluar'],]]
        );
        $_SESSION['success'] = "Data Warga Berhasil Diubah";
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>DATA KARANTINA WARGA</title>
        <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container">
            <br>
            <center><h2>EDIT DATA WARGA KARANTINA</h2></center>
            <a href="index.php" class="btn btn-primary">Kembali</a>
            <form method="POST">
                <div class="form-group">
                <strong>Nama:</strong>
                    <input type="text" value="<?php echo "$cvd->Nama"; ?>"" class="form-control" name="Nama" required="" placeholder="Nama Warga">
                    <strong>Alamat:</strong>
                    <input type="text" value="<?php echo "$cvd->Alamat"; ?>"" class="form-control" name="Alamat" required="" placeholder="Alamat Warga">
                    <strong>Tanggal Keluar:</strong>
                    <input type="text" class="form-control" name="Keluar" required="" placeholder="Tanggal Keluar Karantina">
                    <br>
                    <button type="submit" name="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </body>
</html>