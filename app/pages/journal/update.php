<?php include "./../../config/koneksi.php" ?>
<?php include "./../template/header.php" ?>
<div class="container">
    <?php


    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
    if (isset($_GET['id_jurnal'])) {
        $id_jurnal=input($_GET["id_jurnal"]);

        $sql="select * from tb_jurnal where id_jurnal=$id_jurnal";
        $hasil=mysqli_query($kon, $sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_jurnal=htmlspecialchars($_POST["id_jurnal"]);
        $nama_pengarang=input($_POST["nama_pengarang"]);
        $judul_jurnal=input($_POST["judul_jurnal"]);
        $penerbit=input($_POST["penerbit"]);
        $tahun_terbit=input($_POST["tahun_terbit"]);
        $volume=input($_POST["volume"]);

        //Query update data pada tabel jurnal
        $sql="update tb_jurnal set
			nama_pengarang='$nama_pengarang',
			judul_jurnal='$judul_jurnal',
			penerbit='$penerbit',
			tahun_terbit='$tahun_terbit',
			volume='$volume'
			where id_jurnal=$id_jurnal";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon, $sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";
        }
    }

    ?>
    <h4>Update Data</h4>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama Pengarang:</label>
            <input type="text" name="nama_pengarang" value="<?= $data["nama_pengarang"]?>" class="form-control" placeholder="Nama Pengarang" required />

        </div>
        <div class="form-group">
            <label>Judul Jurnal:</label>
            <input type="text" name="judul_jurnal" value="<?= $data["judul_jurnal"]?>" class="form-control" placeholder="Judul Jurnal" required/>

        </div>
        <div class="form-group">
            <label>Penerbit:</label>
            <input type="text" name="penerbit" value="<?= $data["penerbit"]?>" class="form-control" placeholder="Penerbit" required></input>

        </div>
        <div class="form-group">
            <label>Tahun Terbit:</label>
            <input type="text" name="tahun_terbit" value="<?= $data["tahun_terbit"] ?>" class="form-control" placeholder="Tahun Terbit" required/>
        </div>
        <div class="form-group">
            <label>Volume:</label>
            <input type="text" name="volume" value="<?= $data["volume"]?>" class="form-control" placeholder="Volume" required/>
        </div>
        <input type="hidden" name="id_jurnal" value="<?= $data['id_jurnal']; ?>" />

        <button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
    </form>
</div>
<?php include "./../template/footer.php" ?>