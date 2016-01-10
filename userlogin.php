<?php
	include "koneksi.php";
	
	$stmt = $db->prepare('select * from user where username = ?');
	$stmt->execute(array($_POST['username']));
	$user = $stmt->fetch(PDO::FETCH_OBJ);
	//$salt = 'dfasdsd<>:IIUY7868756293(*^&^$^%*^*&';
	
	//if($user != null && md5($_POST['password'].$salt) == $user->password){
	if($user != null && $_POST['username'] == 'user' && $_POST['password'] == $user->password){
	header('location:admin.php');
	// $_SESSION['userlogin'] = 'login';
	
	if($_POST['remember'] == '1'){
	setcookie('user', 'admin', time()+(3600));
	} else {
	setcookie('user', 'admin');
	}
		}
	elseif($user != null && $_POST['password'] == $user->password){
	header('location:user.php');
	
		if($_POST['remember'] == '1'){
		setcookie('user', 'login', time()+(3600));
		} else {
		setcookie('user', 'login');
		}
	}
	else {
	echo "<h1>Kombinasi Username &amp; Password tidak tepat</h1>";
	}