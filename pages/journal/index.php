<?php include "../template/header.php"; ?>
		
<?php
    
    include "../../config/koneksi.php";

    // Cek apakah ada nilai dari method GET dengan nama id_akun
    if (isset($_GET['id_jurnal'])) {
        $id_jurnal=htmlspecialchars($_GET["id_jurnal"]);

        $sql="delete from tb_jurnal where id_jurnal='$id_jurnal' ";
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
    <h4> Data Jurnal </h4>
    <a href="create.php" class="btn btn-sm btn-primary" role="button">Tambah Data</a>
    <div class="mb-4">
        <table class="table table-bordered table-hover">
            <br>
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengarang</th>
                <th>Judul Jurnal</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Volume</th>
                <th colspan='2'>Aksi</th>
            </tr>
            </thead>
            <?php
            include "../../config/koneksi.php";
            $sql="select * from tb_jurnal";

            $hasil=mysqli_query($kon,$sql);
            $no=0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;
                ?>
                <tbody>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $data["nama_pengarang"]; ?></td>
                    <td><?php echo $data["judul_jurnal"];   ?></td>
                    <td><?php echo $data["penerbit"];   ?></td>
                    <td><?php echo $data["tahun_terbit"];   ?></td>
                    <td><?php echo $data["volume"];   ?></td>
                    <td>
                        <a href="update.php?id_jurnal=<?php echo htmlspecialchars($data['id_jurnal']); ?>" class="btn btn-sm btn-warning" role="button">Update</a>
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_jurnal=<?php echo $data['id_jurnal']; ?>" class="btn btn-sm btn-danger" role="button">Delete</a>
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