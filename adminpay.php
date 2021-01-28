<?php
include "db_conn.php";

  $bid=$_GET['id'];
  $date = date('Y-m-d H:i:s');
  $update = mysqli_query($conn,"UPDATE billing SET status='1',payment_date='$date' WHERE id =$bid");



  if($update)
        header("Location:billing.php");

 ?>
