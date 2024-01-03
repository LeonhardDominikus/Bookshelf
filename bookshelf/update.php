<!DOCTYPE html>
<html>
<head>
    <title>Form Udate Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan cover id
    if (isset($_GET['id'])) {
        $id=input($_GET["id"]);

        $sql="select * from books where id=$id";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id=htmlspecialchars($_POST["id"]);
        $cover=input($_POST["cover"]);
        $judul=input($_POST["judul"]);
        $kategori=input($_POST["kategori"]);
        $sinopsis=input($_POST["sinopsis"]);
        $upload=input($_POST["upload"]);

        //Query update data pada tabel anggota
        $sql="update books set
			cover='$cover',
			judul='$judul',
			kategori='$kategori',
			sinopsis='$sinopsis',
			upload='$upload'
			where id=$id";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?><br>
    <center><h1>Update Data Buku</h1></center>
    <br>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Cover:</label><br>
            <input type="file" name="cover" required />
        </div>
        <div class="form-group">
            <label>Judul:</label>
            <input type="text" name="judul" class="form-control" placeholder="Masukan Nama Judul" required/>
        </div>
        <div class="form-group">
            <label>Kategori :</label>
            <input type="text" name="kategori" class="form-control" placeholder="Masukan Kategori" required/>
        </div>
        <div class="form-group">
            <label>File:</label><br>
            <input type="file" name="upload" required />
        </div>
        <div class="form-group">
            <label>Sinopsis :</label>
            <textarea type="text" name="sinopsis" class="form-control" rows="5" placeholder="Pilih Sinopsis" required/></textarea>
        </div>


        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>