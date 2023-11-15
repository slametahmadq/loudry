<?php
include 'konek.php';
$koneksi->query("DELETE FROM user WHERE id_user ='$_GET[kode]'");
echo "<meta http-equiv='refresh' content='1;url=index1.php?halaman=paket'>";
echo '<div id="flash" data-flash="Berhasil Hapus Data"></div>';
?>