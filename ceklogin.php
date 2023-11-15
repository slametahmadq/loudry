<?php
 session_start();
?>

<link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<style>
	.swal2-popup {
		font-size: 0.8rem !important;
	}
</style>
<?php
// mengaktifkan session pada php
// session_start();
// menghubungkan php dengan koneksi database
include 'konek.php';
// menangkap data yang dikirim dari form login
$username = $_POST['user'];
$password = $_POST['pass'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from user where username='$username' and password=MD5('$password')");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// cek apakah username dan password di temukan pada database
if ($cek > 0) {
	$data = mysqli_fetch_assoc($login);
	// cek jika user login sebagai admin
	if ($data['role'] == "admin") {
		// buat session login dan username
		
		$_SESSION['nama_user']=$data['nama_user'];
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['username'] = $username;
		
		// $_SESSION['nama'] = $nama;
		$_SESSION['role'] = "admin";
		// alihkan ke halaman dashboard admin
		?>
		<body></body>
		<script>
			Swal.fire({
				position: 'top-end',
				icon: 'success',
				title: 'Akses Berhasil',
				showConfirmButton: false,
				timer: 1000

					}).then((result) => {
				window.location = '<?= ('index1.php') ?>'
			})
			//header("location:index.php?pesan=Berhasil");
		</script>
		<?php
		// cek jika user login sebagai pegawai
	} else if ($data['role'] == "kasir") {
		// buat session login dan username
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "kasir";
		$_SESSION['nama_user']=$data['nama_user'];
		// alihkan ke halaman dashboard pegawai
		?>
		<body></body>
		<script>
			Swal.fire({
				position: 'top-end',
				icon: 'success',
				title: 'Akses Berhasil',
				showConfirmButton: false,
				timer: 1000

					}).then((result) => {
				window.location = '<?= ('index2.php') ?>'
			})
			//header("location:index.php?pesan=Berhasil");
		</script>
		<?php
	} else if ($data['role'] == "owner") {
		// buat session login dan username
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "owner";
		// alihkan ke halaman dashboard pegawai
		header("location:index.php?pesan=Berhasil");
	} else {
		// alihkan ke halaman login kembali
		?>
				<script>
					swal.fire({
						icon: 'error',
						title: 'failure',
						Text: 'Masuk Gagal, Username dan Password Salah'

					}).then((result) => {
						window.location = '<?= ('index.php') ?>'
					})
					//header("location:index.php?pesan=Berhasil");
				</script>
				<!-- echo"<script>alert('User dan Password Anda Salah! Silahkan coba lagi');</script>";
		 echo"<script>location='login.php';</script>"; -->
		<?php
	}
} else {
	?>

	<body></body>
	<script>
		swal.fire({
			icon: 'error',
			title: 'Masuk Gagal, Username dan Password Salah',
			Text: 'Masuk Gagal, Username dan Password Salah'

		}).then((result) => {
			window.location = '<?= ('index.php') ?>'
		})
		//header("location:index.php?pesan=Berhasil");
	</script>
	<!-- echo"<script>alert('User dan Password Anda Salah! Silahkan coba lagi');</script>";
		 echo"<script>location='login.php';</script>"; -->
	<?php
}



?>