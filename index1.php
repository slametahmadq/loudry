<?php
session_start();
if (!isset($_SESSION['role'])) {
  header("location:index.php");
  exit;
}
if(isset($_SESSION['role'])){

  if(($_SESSION['role']=='kasir')){
    header('location:index2.php');
    exit();
  }
}
?>

<?php
include 'header.php';
 include 'sidbar.php';

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <?php
                $halaman =@$_GET['halaman'];
                if ($halaman=="otlet") {
                  include 'outlet.php';
                }else if($halaman=="paket"){
                  include 'paket.php';
                } else if($halaman=="pengguna"){
                  include  'pengguna.php';
                }else if($halaman=="ubah_pengguna"){
                  include  'ubah_pengguna.php';
                }else if($halaman=="hapus_pengguna"){
                  include  'hapus_pengguna.php';
                } 
                else if($halaman=="tambahoutlet"){
                  include  'tambah_outlet.php';
                }
                else if($halaman=="ubah_outlet"){
                  include  'ubah_outlet.php';
                }
                else if($halaman=="hapus_outlet"){
                  include  'hapus_outlet.php';
                }
                else if($halaman=="ubah_paket"){
                  include  'ubah_paket.php';
                }
                else if($halaman=="hapus_paket"){
                  include  'hapus_paket.php';
                } elseif($halaman== 'member'){
                  include 'member.php';
                }
                else if($halaman=="keluar"){
                  include  'keluar.php';
                }
                else {
                 include 'dashboard.php';
                }
                ?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
<?php
 include 'footer.php';
?>