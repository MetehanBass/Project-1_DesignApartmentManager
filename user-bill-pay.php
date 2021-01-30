<?php
include "db_conn.php";

  $bid=$_GET['id'];
  $date = date('Y-m-d H:i:s');
  $update = mysqli_query($conn,"UPDATE billing SET status='1',payment_date='$date' WHERE id =$bid");


  $query = mysqli_query($conn,"SELECT * FROM billing WHERE id =$bid");
  $row=mysqli_fetch_array($query);

  $user_id = $row['user_id'];




  if($update)
        header("Location:user-bill.php?id=$user_id");

 ?>
