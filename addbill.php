<?php
include "db_conn.php";


  if(isset($_POST['billing_date']) && isset($_POST['amount'])) {
      $month = date('Y-m-d',strtotime($_POST['billing_date']));
      $amount = $_POST['amount'];
      $ret=mysqli_query($conn,"select * from users");
$cnt=1;
while($row=mysqli_fetch_array($ret))
{
  $uid = $row['id'];
  $newbilling = $conn->query("INSERT INTO billing (billing_date,user_id,amount) VALUES ('$month','$uid','$amount')");


  }
    header("Location:billing.php?month=$month");
}
 ?>
