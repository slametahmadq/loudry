<?php
$no = 1;
$title = 'outlet';
require 'koneksi.php';
// require 'layout_header.php';
$query = 'SELECT outlet.*, user.nama_user FROM 
outlet LEFT JOIN user ON 
user.outlet_id = outlet.id_outlet';
$data = ambildata($conn, $query);
?>
<div class="card">
  <div class="card-header border-transparent">
    <h3 class="card-title">Data Otlet</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table m-0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Outlet</th>
            <th>Nama</th>
            <th>No.Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data as $outlet): ?>
            <tr>

              <td>
                <?= $no++ ?>
              </td>
              <td>
                <?= $outlet['nama_outlet'] ?>
              </td>
              <td>
                <?php if ($outlet['nama_user'] == null) {
                  echo 'Belum Ada Owner';
                } else {
                  echo $outlet['nama_user'];
                } ?>
              </td>
              <td>
                <?= $outlet['telp_outlet'] ?>
              </td>
              <td>
                <?= $outlet['alamat_outlet'] ?>
              </td>
              <td align="center">
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="" data-toggle="modal" data-target="#modal-edit<?= $outlet['id_outlet']; ?>" title="Edit"
                    class="btn btn-success"><i class="fa fa-edit"></i></a>

                  <a href="#" data-toggle="tooltip" data-placement="bottom" title="Detail" class="btn btn-warning"><i
                      class="fa fa-eye"></i></a>

                  <a href="outlet_hapus.php?id=<?= $outlet['id_outlet']; ?>"
                    onclick="return confirm('Yakin hapus data ? ');" data-toggle="tooltip" data-placement="bottom"
                    title="Hapus" class="btn btn-danger">
                    <i class="fa fa-trash"></i></a>
                    
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /.table-responsive -->
  </div>
  <!-- /.card-body -->
  <div class="card-footer clearfix">
    <button type="button" class="btn btn-sm btn-info float-left" data-toggle="modal" data-target="#modal-default">
      New Outlet
    </button>
    <!-- <a href="index.php?halaman=tambahoutlet" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a> -->
    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
  </div>
  <!-- /.card-footer -->
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Outlet</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="form-group">
            <label for="nama">Nama Outlet</label>
            <input type="text" name="nama" id="nama" class="form-control">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control">
          </div>
          <div class="form-group">
            <label for="telpon">No. Telepon</label>
            <input type="number" name="telepon" id="telpon" class="form-control">
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" name="btn-simpan" class="btn btn-primary" titele="Refresh Data">Simpan</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<?php
$title = 'outlet';
// require'koneksi.php';

if (isset($_POST['btn-simpan'])) {
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telp = $_POST['telepon'];

  $query = "INSERT INTO outlet values ('','$nama','$alamat','$telp')";

  $execute = bisa($conn, $query);
  if ($execute == 1) {
    $success = 'true';
    $title = 'Berhasil';
    $message = 'Berhasil Simpan Data';
    $type = 'success';
    // header('location: index.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
    echo "<meta  http-equiv='refresh'; content='0';>";
    //   <script>     
    //   setInterval( () => {
    //     window.location.href = 'index.php';
    //  }, 1000);
    //  </script>
  } else {
    echo "Gagal Tambah Data";
  }
}

// require'layout_header.php';
?>

<div class="modal fade" id="modal-edit<?= $outlet['id_outlet']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Data Outlet</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="form-group">
            <label for="nama">id Outlet</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= $outlet['nama']; ?>">
          </div>
          <div class="form-group">
            <label for="nama">Nama Outlet</label>
            <input type="text" name="nama" id="nama" class="form-control">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control">
          </div>
          <div class="form-group">
            <label for="telpon">No. Telepon</label>
            <input type="number" name="telepon" id="telpon" class="form-control">
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" name="btn-simpan" class="btn btn-primary" titele="Refresh Data">Simpan</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>