<div class="card">
    <div class="card-header border-transparent">
        <h3 class="card-title">Data Paket</h3>
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
            <div class="card-footer clearfix">
                <button type="button" class="btn btn-sm btn-info float-left" data-toggle="modal"
                    data-target="#modal-tambah" title="Tambah Data">
                    <i class="fa fa-plus"></i>
                </button>

            </div>
            <table class="table m-0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jenis Paket</th>
                        <th>Nama Paket</th>
                        <th>Harga</th>
                        <th>kode Outlet</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // mengambil koneksi ke database 
                    include 'konek.php';
                    //membuat variabel angka
                    $no = 1;
                    //mengambil data dari tabel outlet
                    $select = mysqli_query($koneksi, "SELECT outlet.nama_outlet ,paket.* FROM paket INNER JOIN outlet ON paket.outlet_id = outlet.id_outlet");
                    //melooping(perulangan) dengan menggunakan while
                    while ($data = mysqli_fetch_array($select)) {
                        ?>
                        <tr>
                            <td>
                                <?= $no++ ?>
                            </td>
                            <td>
                                <?= $data['jenis_paket'] ?>
                            </td>
                            <td>
                                <?= $data['nama_paket'] ?>
                            </td>
                            <td>
                                <?= $data['harga'] ?>
                            </td>
                            <td>
                                <?= $data['nama_outlet'] ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="index1.php?halaman=ubah_paket&kode=
                                          <?php echo $data['id_paket'] ?>" class="btn btn-sm btn-info" title="Ubah"><i
                                            class="fa fa-edit"></i></a>
                                    <!-- <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#ubah&index.php?halaman=ubah_outlet&kode=
                                          <?php echo $data['id_outlet'] ?>">ubah</button> -->
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Detail"
                                        class="btn btn-warning"><i class="fa fa-eye"></i></a>

                                    <a href="index1.php?halaman=hapus_paket&kode1=<?php echo $data['id_paket'] ?>"
                                        id="btn-hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus"
                                        class="btn btn-danger">
                                        <i class="fa fa-trash"></i></a>

                                </div>
                            </td>
                        </tr>
            </div>
        <?php } ?>
        </tbody>
        </table>
    </div>
    <!-- /.table-responsive -->
</div>
<!-- /.card-body -->
<div class="card-footer clearfix">

    <!-- <a href="index.php?halaman=tambahoutlet" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a> -->
    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
</div>
<!-- /.card-footer -->
</div>

<!-- Button trigger modal -->

<!-- Modal -->

<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Paket</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label>Jenis Paket</label>
                        <select name="jenis_paket" class="form-control">
                            <option value="kiloan">Kiloan</option>
                            <option value="selimut">Selimut</option>
                            <option value="bedcover">Bedcover</option>
                            <option value="kaos">Kaos</option>
                            <option value="lain">Lain</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Paket</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telpon">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telpon">Pilih Outlet</label>
                        <select name="outlet_id" class="form-control">
                            <?php
                            $select = mysqli_query($koneksi, "SELECT * FROM outlet");
                            //melooping(perulangan) dengan menggunakan while
                            while ($data = mysqli_fetch_array($select)) {
                                ?>
                                <option value="<?= $data['id_outlet'] ?>">
                                    <?= $data['nama_outlet']; ?>
                                </option>
                            <?php } ?>
                        </select>

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
include 'konek.php';
if (isset($_POST['btn-simpan'])) {
    $jenis = $_POST['jenis_paket'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $kode = $_POST['outlet_id'];
    $koneksi->query("INSERT INTO paket values 
  ('','$jenis','$nama','$harga','$kode')");
    echo '<div id="flash" data-flash="Berhasil Tambah Data"></div>';
    echo "<meta  http-equiv='refresh'; content='2';>";

}

?>