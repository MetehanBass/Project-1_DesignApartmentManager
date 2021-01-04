<?php
session_start();



include "db_conn.php";
if(isset($_POST['submit'])){
	if(empty($_POST['uname']) || empty($_POST['password'])) {
		header("Location:index.php?error=Kullanıcı adı ve parola gerekli.");

	}
	else{
		$uname= $_POST['uname'];
		$pass = $_POST['password'];

		$db=mysqli_select_db($conn,"test_db");
		$query =mysqli_query($conn,"SELECT * FROM users WHERE password='$pass' AND user_name='$uname'");

		$rows = mysqli_num_rows($query);
		$qry = mysqli_fetch_array($query);
		if($rows == 1){
			$_SESSION['username']=$uname;
			$_SESSION['id']=$qry['id'];	

			header("Location: home.php");
			exit();
		}
		else{
			header("Location: index.php?error=Hatalı kullanıcı adı ya da parola.");
			exit();
		}
		mysqli_close($conn);
	}
}
?>
