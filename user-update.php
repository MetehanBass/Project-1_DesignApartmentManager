<?php
include "db_conn.php";

  $id = $_POST['update_id'];

  $username = $_POST['username'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phonenum = $_POST['phonenum'];
  $phonenum1 = $_POST['phonenum1'];

  $query = "UPDATE users SET user_name = '$username',password = '$password', name = '$name', email = '$email', phonenum = '$phonenum', phonenum1 = '$phonenum1' WHERE id='".$id."'";
  $query_run = mysqli_query($conn,$query);

  if($query)
        header('Location:profile.php?id='.$id.'');

 ?>
