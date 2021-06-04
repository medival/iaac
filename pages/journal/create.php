<?php include "./../../config/koneksi.php"; ?>

<?php include "./../template/header.php"; ?>
<div class="container">
    <h2> Input Jurnal </h2>
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

        $nama_pengarang=input($_POST["nama_pengarang"]);
        $judul_jurnal=input($_POST["judul_jurnal"]);
        $penerbit=input($_POST["penerbit"]);
        $tahun_terbit=input($_POST["tahun_terbit"]);
        $volume=input($_POST["no_hp"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into tb_jurnal (nama_pengarang,judul_jurnal,penerbit,tahun_terbit,volume) values
		('$nama_pengarang','$judul_jurnal','$penerbit','$tahun_terbit','$volume')";

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
    <h2>Tambah Jurnal</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama Pengarang:</label>
            <input type="text" name="nama_pengarang" class="form-control" placeholder="Nama Pengarang" required />

        </div>
        <div class="form-group">
            <label>Judul Jurnal:</label>
            <input type="text" name="judul_jurnal" class="form-control" placeholder="Judul Jurnal" required/>

        </div>
        <div class="form-group">
            <label>Penerbit:</label>
            <textarea name="penerbit" class="form-control" rows="5" placeholder="Penerbit" required></textarea>

        </div>
        <div class="form-group">
            <label>Tahun Terbit:</label>
            <input type="text" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit" required/>
        </div>
        <div class="form-group">
            <label>Volume:</label>
            <input type="text" name="volume" class="form-control" placeholder="Volume" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include "../template/footer.php"; ?>