<?php
include "db_conn.php";

  $id = $_POST['update_id'];

  $username = $_POST['username'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phonenum = $_POST['phonenum'];
  $phonenum1 = $_POST['phonenum1'];
  $block = $_POST['block'];
  $flat = $_POST['flat'];
  $dept = $_POST['dept'];
  $extradept = $_POST['extradept'];

  $query = "UPDATE users SET user_name = '$username',password = '$password', name = '$name', email = '$email', phonenum = '$phonenum', phonenum1 = '$phonenum1', block = '$block', flat ='$flat', dept = '$dept' , extradept = '$extradept' WHERE id='".$id."'";
  $query_run = mysqli_query($conn,$query);

  if($query)
        header('Location:update-profile.php?id='.$id.'');

 ?>