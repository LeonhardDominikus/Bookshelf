<!DOCTYPE html>
<html>
<head>
    <title>Form Buku Baru</title>
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
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id=input($_POST["id"]);
        $cover=input($_POST["cover"]);
        $judul=input($_POST["judul"]);
        $kategori=input($_POST["kategori"]);
        $sinopsis=input($_POST["sinopsis"]);
        $upload=input($_POST["upload"]);


        //Query input menginput data kedalam tabel anggota
        $sql="insert into books (id,cover,judul,kategori,sinopsis,upload) values
		('$id','$cover','$judul','$kategori','$sinopsis','$upload')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h1>Buku Baru</h1>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>ID:</label>
            <input type="text" name="id" class="form-control" placeholder="Masukan ID" required />
        </div>
        <div class="form-group">
            <label>Cover:</label><br>
            <input type="file" name="cover" required />
        </div>
        <div class="form-group">
            <label>Judul:</label>
            <input type="text" name="judul" class="form-control" placeholder="Masukan Judul" required/>
        </div>
       <div class="form-group">
            <label>Kategori :</label>
            <input type="text" name="kategori" class="form-control" placeholder="Pilih Kategori" required/>
        </div>
        <div class="form-group">
            <label>Upload File:</label><br>
            <input type="file" name="upload"required/>
        </div>
        <div class="form-group">
            <label>Sinopsis</label>
            <textarea type="text" name="sinopsis" class="form-control" rows="5" placeholder="Masukkan sinopsis" required/></textarea>
        </div>
<br><br>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>