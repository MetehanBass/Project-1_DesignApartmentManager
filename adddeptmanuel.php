<?php
include "db_conn.php";

  $dept = $_POST['manuelDept'];

  $query1 = "UPDATE users SET extradept = extradept+$dept";
  $query_run1 = mysqli_query($conn,$query1);



  if($query1)
        header('Location:users.php');

 ?>
