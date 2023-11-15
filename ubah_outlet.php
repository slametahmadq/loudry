<h2 class="text-center">Ubah Data Outlet</h2>
<?php
include 'konek.php';
$a = $koneksi->query("SELECT * FROM outlet WHERE id_outlet ='$_GET[kode]'");
$data = $a->fetch_assoc();
?>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleFormControlInput1">Nama Outlet</label>
        <input type="text" name="nama" class="form-control" value="<?= $data['nama_outlet']; ?>">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Alamat</label>
        <textarea class="form-control" name="alamat" rows="5"><?= $data['alamat_outlet']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">No Telepon</label>
        <input type="text" name="telepon" class="form-control" value="<?= $data['telp_outlet']; ?>">
    </div>
    <div class="modal-footer">
        <button class="btn btn-success" name="simpan"> Simpan Perubahan</button>
    </div>
</form>

<?php
include 'konek.php';
if (isset($_POST['simpan'])) {
    $koneksi->query("update outlet set nama_outlet='$_POST[nama]',
 	 alamat_outlet='$_POST[alamat]',telp_outlet='$_POST[telepon]' WHERE id_outlet='$_GET[kode]'");
    // echo "<br><div class='alert alert-success text-center'> Data Berhasil Disimpan</div>";
   // echo '<script>alert("Berhasil")</script>';
    echo '<div id="flash" data-flash="Berhasil Ubah Data"></div>';
    echo "<meta http-equiv='refresh' content='3;url=index1.php?halaman=otlet'>";
    
}
?>