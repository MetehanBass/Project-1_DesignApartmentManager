<?php
include "db_conn.php";

  $query1 = "UPDATE users SET dept = dept+250  WHERE flat > 4";
  $query = "UPDATE users SET dept = dept+150  WHERE flat < 4";
  $query_run = mysqli_query($conn,$query);
  $query_run1 = mysqli_query($conn,$query1);

  if($query)
        header('Location:users.php');

 ?>
