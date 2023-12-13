<!DOCTYPE html>
<html>
<head>
    <title>update data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php

    include "koneksi.php";

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (isset($_GET['id_mahasiswa'])) {
        $id_mahasiswa=input($_GET["id_mahasiswa"]);

        $sql="select * from mahasiswa where id_mahasiswa=$id_mahasiswa";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_mahasiswa=htmlspecialchars($_POST["id_mahasiswa"]);
        $nim=input($_POST["nim"]);
        $nama=input($_POST["nama"]);
        $jenis_kelamin=input($_POST["jenis_kelamin"]);
        $jurusan=input($_POST["jurusan"]);
        $alamat=input($_POST["alamat"]);

        //Query update data pada tabel anggota
        $sql="update mahasiswa set
			nim='$nim',
			nama='$nama',
			jenis_kelamin='$jenis_kelamin',
			jurusan='$jurusan',
			alamat='$alamat'
			where id_mahasiswa=$id_mahasiswa";

        $hasil=mysqli_query($kon,$sql);

        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nim:</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukan Nim" required />

        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required/>
        </div>
       <div class="form-group">
            <label>Jenis Kelamin :</label>
            <input type="text" name="jenis_kelamin" class="form-control" placeholder="Masukan jenis kelamin" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Jurusan:</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan jurusan" required/>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="5"placeholder="Masukan Alamat" required></textarea>
        </div>       

        <input type="hidden" name="id_mahasiswa" value="<?php echo $data['id_mahasiswa']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>