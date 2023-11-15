<?php
$title = 'outlet';
require 'koneksi.php';

if (isset($_POST['btn-simpan'])) {
    $nama = $_POST['nama_outlet'];
    $alamat = $_POST['alamat_outlet'];
    $telp = $_POST['telp_outlet'];

    $query = "INSERT INTO outlet (nama_outlet,alamat_outlet,telp_outlet) values ('$nama','$alamat','$telp')";

    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil Simpan Data';
        $type = 'success';
        header('location:index1.php');
    } else {
        echo "Gagal Tambah Data";
    }
}

// require'layout_header.php';
?>

<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="white-box">
            <form method="post" action="">
                <div class="form-group">
                    <label>Nama Outlet</label>
                    <input type="text" name="nama_outlet" class="form-control">
                </div>
                <div class="form-group">
                    <label>Alamat Outlet</label>
                    <textarea name="alamat_outlet" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="telp_outlet" class="form-control">
                </div>
                <div class="text-right">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" name="btn-simpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>