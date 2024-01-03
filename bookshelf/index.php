<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>User Dashboard</title>
</head>

<body>
    <!--   <div class="container"> -->
    <h1>
        <center> DAFTAR BUKU </center>
    </h1><br>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data Buku</a>
    <a href="logout.php" class="btn btn-warning" style="float: right;">Logout</a>

    <?php

    include "koneksi.php";


    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET["id"]);

        $sql = "delete from books where id='$id' ";
        $hasil = mysqli_query($kon, $sql);

        //Kondisi apakah berhasil atau tidak
        if ($hasil) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
        }
    }
    ?>


    <tr class="table-danger">
        <br>
        <thead>
            <tr>
                <table class="my-3 table table-bordered">
                    <tr class="table-primary">
                        <th style="width:25px;">ID</th>
                        <th style="width:50px;">Cover</th>
                        <th style="width:50px;">Judul</th>
                        <th style="width:25px;">Kategori</th>
                        <th style="width:300px;">Sinopsis / Deskripsi</th>
                        <th style="width:10px;">File</th>
                        <th style="width:125px;">Aksi</th>

                    </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql = "select * from books order by id desc";

        $hasil = mysqli_query($kon, $sql);
        while ($data = mysqli_fetch_array($hasil)) {

        ?>
            <tbody>
                <tr>
                    <td><?php echo $data["id"]; ?></td>
                    <div class="image-wrapper">
                        <td><?php echo "<img src='img/$data[cover]' width='75px'/>"; ?></td>
                    </div>
                    <td><?php echo $data["judul"];   ?></td>
                    <td><?php echo $data["kategori"];   ?></td>
                    <td><?php echo $data["sinopsis"];   ?></td>
                    <td><a href="pdf/<?= $data['upload'] ?>" target="_blank" class="btn btn-secondary" role="button">OPEN</a></td>
                    <td>
                        <a href="update.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-info" role="button"> Update Data </a>
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $data['id']; ?>" class="btn btn-danger" role="button" style="float: right;">Delete</a>
                    </td>
                </tr>
            </tbody>
        <?php
        }
        ?>
        </table>
        <!--</div>-->
</body>

</html>