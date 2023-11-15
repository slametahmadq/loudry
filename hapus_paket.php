<?php
include 'konek.php';
$koneksi->query("DELETE FROM paket WHERE id_paket ='$_GET[kode1]'");
echo "<meta http-equiv='refresh' content='1;url=index1.php?halaman=paket'>";
echo '<div id="flash" data-flash="Berhasil Hapus Data"></div>';
?>