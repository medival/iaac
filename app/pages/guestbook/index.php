<?php include "../template/header.php"; ?>
		
<?php
    
    include "../../config/koneksi.php";

    // Cek apakah ada nilai dari method GET dengan nama id_akun
    if (isset($_GET['id_guestbook'])) {
        $id_guestbook=htmlspecialchars($_GET["id_guestbook"]);

        $sql="delete from tb_guestbook where id_guestbook='$id_guestbook' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");
            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
        }
?>
    
	<div class="container">
    <h4> Data Guest Book </h4>
    <a href="create.php" class="btn btn-sm btn-primary" role="button">Tambah Data</a>
    <div class="mb-4">
        <table class="table table-bordered table-hover">
            <br>
            <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Pesan</th>
                <th>Tanggal</th>
                <th colspan='2'>Aksi</th>
            </tr>
            </thead>
            <?php
            include "../../config/koneksi.php";
            $sql="select * from tb_guestbook";

            $hasil=mysqli_query($kon,$sql);
            $no=0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;
                ?>
                <tbody>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $data["nama"]; ?></td>
                    <td><?php echo $data["alamat"];   ?></td>
                    <td><?php echo $data["pesan"];   ?></td>
                    <td><?php echo $data["tanggal"];   ?></td>
                    <td>
                        <a href="update.php?id_guestbook=<?php echo htmlspecialchars($data['id_guestbook']); ?>" class="btn btn-sm btn-warning" role="button">Update</a>
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_guestbook=<?php echo $data['id_guestbook']; ?>" class="btn btn-sm btn-danger" role="button">Delete</a>
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