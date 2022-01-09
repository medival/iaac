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
    if (isset($_GET['id_guestbook'])) {
        $id_guestbook=input($_GET["id_guestbook"]);

        $sql="select * from tb_guestbook where id_guestbook=$id_guestbook";
        $hasil=mysqli_query($kon, $sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_guestbook=htmlspecialchars($_POST["id_guestbook"]);
        $nama=input($_POST["nama"]);
        $alamat=input($_POST["alamat"]);
        $pesan=input($_POST["pesan"]);
        $tanggal=date("Y-m-d");

        //Query update data pada tabel guestbook
        $sql = "UPDATE `tb_guestbook` SET `nama` = '$nama', `alamat` = '$alamat', `pesan` = '$pesan', `tanggal` = '$tanggal' WHERE `tb_guestbook`.`id_guestbook` = $id_guestbook;";

        var_dump($sql);
        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon, $sql);

        var_dump($hasil);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";
        }
    }

    ?>
    <h4>Update Guest Book </h4>
    <form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama :</label>
            <input type="text" name="nama" value="<?= $data["nama"]?>" class="form-control" placeholder="Nama" required />
        </div>

        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" name="alamat" value="<?= $data["alamat"]?>" class="form-control" placeholder="Alamat" required/>
        </div>

        <div class="form-group">
            <label>Pesan:</label>
            <textarea name="pesan"  class="form-control" placeholder="Penerbit" required> <?= $data["pesan"]?> </textarea>
        </div>

        <input type="hidden" name="id_guestbook" value="<?= $data['id_guestbook']; ?>" />

        <button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
    </form>
</div>
<?php include "./../template/footer.php" ?>