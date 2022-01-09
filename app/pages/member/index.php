<?php include "../template/header.php"; ?>
		
<?php

    include "../../config/koneksi.php";

    //Cek apakah ada nilai dari method GET dengan nama id_akun
    if (isset($_GET['id_anggota'])) {
        $id_akun=htmlspecialchars($_GET["id_anggota"]);

        $sql="delete from tb_akun where id_anggota='$id_akun' ";
        $hasil=mysqli_query($kon, $sql);

        //Kondisi apakah berhasil atau tidak
        if ($hasil) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
        }
    }
?>
    
	<div class="container">
    <h4> Data Akun </h4>
    <a href="create.php" class="btn btn-sm btn-primary" role="button">Tambah Data</a>
    <div class="mb-4">
        <table class="table table-bordered table-hover">
            <br>
            <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>No HP</th>
                <th colspan='2'>Aksi</th>
            </tr>
            </thead>
            <?php
            include "../../config/koneksi.php";
            $sql="select * from tb_akun";

            $hasil=mysqli_query($kon, $sql);
            $no=0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++; ?>
                <tbody>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data["username"]; ?></td>
                    <td><?php echo $data["nama"]; ?></td>
                    <td><?php echo $data["alamat"]; ?></td>
                    <td><?php echo $data["email"]; ?></td>
                    <td><?php echo $data["no_hp"]; ?></td>
                    <td>
                        <a href="update.php?id_anggota=<?php echo htmlspecialchars($data['id_anggota']); ?>" class="btn btn-sm btn-warning" role="button">Update</a>
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_anggota=<?php echo $data['id_anggota']; ?>" class="btn btn-sm btn-danger" role="button">Delete</a>
                    </td>
                </tr>
                </tbody>
                <?php
            }
            ?>
        </table>
	</div>
	</div>

<?php include "../template/footer.php"; ?>