<?php include "./../../config/koneksi.php"; ?>

<?php include "./../template/header.php"; ?>
<div class="container">
    <h4> Pendaftaran Akun </h4>
    <?php
    
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username=input($_POST["username"]);
        $nama=input($_POST["nama"]);
        $alamat=input($_POST["alamat"]);
        $email=input($_POST["email"]);
        $no_hp=input($_POST["no_hp"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into tb_akun (username,nama,alamat,email,no_hp) values
		('$username','$nama','$alamat','$email','$no_hp')";

        var_dump($sql);
        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        var_dump($hasil);
        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" class="form-control" placeholder="Masukan Username" required />

        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required/>

        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="5"placeholder="Masukan Alamat" required></textarea>

        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Masukan Email" required/>
        </div>
        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include "../template/footer.php"; ?>