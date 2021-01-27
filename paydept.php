<?php
include "db_conn.php";
session_start();
  $bid=$_GET['id'];
  $user = $_SESSION['id'];
  $date = date('Y-m-d H:i:s');
  $update = mysqli_query($conn,"UPDATE billing SET status='1',payment_date='$date' WHERE id =$bid");



  if($update)
        header('Location:profile.php?id='.$user.'');

 ?>
