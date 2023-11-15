<h2 class="text-center">Ubah Data Paket</h2>
<?php
include 'konek.php';
$a = $koneksi->query("SELECT * FROM paket WHERE id_paket ='$_GET[kode]'");
$data = $a->fetch_assoc();
?>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleFormControlInput1">Jenis Paket</label>
        <input type="text" name="jenis" class="form-control" value="<?= $data['jenis_paket']; ?>">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Nama Paket</label>
        <input type="text" name="nama" class="form-control" value="<?= $data['nama_paket']; ?>">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Harga</label>
        <textarea class="form-control" name="harga" rows="5"><?= $data['harga']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="outlet">Pilih Outlet</label>
        <select name="outlet_id" class="form-control">
            <?php
            $select = mysqli_query($koneksi, "SELECT * FROM outlet");
            //melooping(perulangan) dengan menggunakan while
            while ($data1 = mysqli_fetch_array($select)) {
                ?>
                <?php if ($data1['id_outlet'] == $data['outlet_id']): ?>
                    <option value="<?= $data1['id_outlet'] ?>" selected>
                        <?= $data1['nama_outlet']; ?>
                    </option>
                <?php endif ?>
                <option value="<?= $data1['id_outlet'] ?>">
                    <?= $data1['nama_outlet']; ?>
                </option>
            <?php } ?>
        </select>

    </div>
    <div class="modal-footer">
        <button class="btn btn-success" name="simpan"> Simpan Perubahan</button>
    </div>
</form>

<?php
include 'konek.php';
if (isset($_POST['simpan'])) {
    $koneksi->query("update paket set jenis_paket='$_POST[jenis]',
 	 nama_paket='$_POST[nama]',harga='$_POST[harga]',outlet_id='$_POST[outlet_id]' WHERE id_paket='$_GET[kode]'");
    // echo "<br><div class='alert alert-success text-center'> Data Berhasil Disimpan</div>";
    // echo '<script>alert("Berhasil")</script>';
    echo '<div id="flash" data-flash="Berhasil Ubah Data"></div>';
    echo "<meta http-equiv='refresh' content='3;url=index1.php?halaman=paket'>";

}
?>