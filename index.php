<?php
session_start();
if (isset($_SESSION['role'])) {
	if(($_SESSION['role']=='admin')){
		header('location:index1.php');
		exit;
	}
	if(($_SESSION['role']=='kasir')){
		header('location:index2.php');
		exit;
	}
  }
  
 
?>

.<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  
 
</head>
<body>
<div class="wrapper">
  <form action="ceklogin.php" method="post">
    <h1>Masuk</h1>
    <div class="input-box">
      <input type="text" name="user" placeholder="Nama Pengguna" required><i class='bx bxs-user'></i>
    </div>
    <div class="input-box">
      <input type="password" name="pass" placeholder="Kata Sandi" required><i class='bx bxs-lock-alt'></i>
    </div>
    <div class="remember-forgot">
      <label><input type="checkbox">Ingatkan Saya</label>
      <a href="#">Lupa Kata Sandi</a>
    </div>
    
    <button type="submit" class="btn">Masuk</button>
    <div class="register-link">
      <p>Tidak Punya Akun? <a href="#">Daftar</a></p>
    </div>
  </form>
</div>
</body>
</html>