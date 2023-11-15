<h2 class="text-center">Ubah Data Pengguna</h2>
<?php
$role = ['admin', 'owner', 'kasir'];
include 'konek.php';
$a = $koneksi->query("SELECT * FROM user WHERE id_user ='$_GET[kode]'");
$data = $a->fetch_assoc();
?>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $data['nama_user']; ?>">
    </div>
    <div class="form-group">
        <label for="user">Nama Pengguna</label>
        <input type="text" name="user" class="form-control" value="<?= $data['username']; ?>">
    </div>
    <div class="form-group">
        <label for="pass">Kata Sandi</label>
        <input type="password" name="pass" placeholder="Kosongkan jika kata sandi tidak dirubah" class="form-control"
            value="">
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

    <div class="form-group">
        <label for="outlet">Staus</label>
        <select name="role" class="form-control">
            <?php foreach ($role as $key): ?>
                <?php if ($key == $data['role']): ?>
                    <option value="<?= $key ?>" selected>
                        <?= $key ?>
                    </option>
                <?php endif ?>
                <option value="<?= $key ?>">
                    <?= ucfirst($key) ?>
                </option>
            <?php endforeach ?>
        </select>

    </div>

    <div class="modal-footer">
        <button class="btn btn-success" name="simpan"> Simpan Perubahan</button>
    </div>
</form>

<?php
include 'konek.php';
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $username = $_POST['user'];
    $role = $_POST['role'];
    $outlet = $_POST['outlet_id'];
    if ($_POST['pass'] != null) {
        $pass = md5($_POST['pass']);
        $koneksi->query("UPDATE user SET nama_user = '$nama' , username = '$username'  , password ='$pass',outlet_id='$outlet', role = '$role' WHERE id_user = '$_GET[kode]'");
    } else {
        $koneksi->query("UPDATE user SET nama_user = '$nama' , username = '$username' ,outlet_id='$outlet', role = '$role' WHERE id_user = '$_GET[kode]'");
    }
    echo '<div id="flash" data-flash="Berhasil Ubah Data"></div>';
    echo "<meta http-equiv='refresh' content='3;url=index1.php?halaman=pengguna'>";
}
?>