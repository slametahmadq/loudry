<?php
include 'konek.php';
$koneksi->query("DELETE FROM outlet WHERE id_outlet ='$_GET[kode]'");
echo "<meta http-equiv='refresh' content='1;url=index1.php?halaman=otlet'>";
echo '<div id="flash" data-flash="Berhasil Hapus Data"></div>';
?>