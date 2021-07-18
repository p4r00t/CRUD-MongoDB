<?php session_start();
    require 'koneksi.php';
    if(isset($_GET['id'])) {
        $cvd = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
    }
    if(isset($_POST['submit'])){
        require 'koneksi.php';
        $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
        $_SESSION['success'] = "Data Warga Berhasil Dihapus";
        header('Location: index.php');
    }
?>

<DOCTYPE html>
<html>
    <head>
        <title>DATA KARANTINA WARGA</title>
        <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <br>
            <center><h2>HAPUS DATA WARGA KARANTINA</h2></center>
            <h4>Atas Nama <b> <?php echo "$cvd->Nama"; ?></b>, Alamat di <b> <?php echo "$cvd->Alamat"; ?></h3>
            <form method="POST">
                <div class="form-group">
                    <input type="hidden" value="<?php echo "cvd->Nama"; ?>" class="form-control" name="Nama">
                    <a href="index.php" class="btn btn-primary">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
</div>
</form>
</div>
</body>
</html>