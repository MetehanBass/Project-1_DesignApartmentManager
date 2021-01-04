<?php
include "db_conn.php";
if(isset($_POST['submit'])){
	if(empty($_POST['aname']) || empty($_POST['password'])) {
		header("Location:admin.php?error=Kullanıcı adı ve parola gerekli.");

	}
	else{
		$aname= $_POST['aname'];
		$pass = $_POST['password'];

		$db=mysqli_select_db($conn,"test_db");
		$query =mysqli_query($conn,"SELECT * FROM admins WHERE password='$pass' AND admin_name='$aname'");

		$rows = mysqli_num_rows($query);
		if($rows == 1){
			header("Location: admin-panel.php");
			exit();
		}
		else{
			header("Location: admin.php?error=Hatalı kullanıcı adı ya da parola.");
			exit();
		}
		mysqli_close($conn);
	}
}

?>
