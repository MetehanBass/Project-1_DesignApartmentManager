<?php
include "db_conn.php";
session_start();
  $user=$_GET['id'];
  $paydept = $_POST['paydept'];
  $username = $_SESSION['username'];


  $query = "SELECT * from users where id='".$user."'";
  $result = mysqli_query($conn, $query) or die ( mysqli_error());
  $row = mysqli_fetch_assoc($result);

  $name = $row['name'];

  $query1 = "UPDATE users SET dept = dept-$paydept WHERE id='".$user."'";
  $query_run1 = mysqli_query($conn,$query1);

  $date = date('Y-m-d H:i:s');
  $query2 = mysqli_query($conn,"INSERT INTO paymentdetails (username,name,amount,paydate) VALUES  ('$username','$name','$paydept','$date')");
  $query_run2 = mysqli_query($conn,$query2);




  if($query1)
        header('Location:profile.php?id='.$user.'');

 ?>
