<?php include "./../../config/koneksi.php"; ?>

<?php include "./../template/header.php"; ?>
<div class="container">
    <h2> Input Guest Book </h2>
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

        $nama=input($_POST["nama"]);
        $alamat=input($_POST["alamat"]);
        $pesan=input($_POST["penerbit"]);

        //Query input menginput data kedalam tabel guestbook
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
    <h2></h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama :</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama Pengunjung" required />

        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" name="alamat" class="form-control" placeholder="Kota Pengunjung" required/>

        </div>
        <div class="form-group">
            <label>Pesan:</label>
            <textarea name="pesan" class="form-control" rows="5" placeholder="Kepentingan/Pesan" required></textarea>
        </div>

        <button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
    </form>
</div>
<?php include "../template/footer.php"; ?>