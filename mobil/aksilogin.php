<?php
	include ("conn.php");
	$query=mysql_query("select * from admin where username = '".$_POST['u']."' and password = '".md5($_POST['p'])."'");
	$q = mysql_num_rows($query);
	
	if($q > 0){
		while($r=mysql_fetch_array($query)){
			if($r['status']=="terdaftar"){
				session_start();
				$_SESSION['u'] = $r['username'];
				header("location:index.php?l=mobil");
			}else{
				header("location:login.php?error=bt");
			}
		}
	}else{
		header("location:login.php?error=bm");
	}
?>