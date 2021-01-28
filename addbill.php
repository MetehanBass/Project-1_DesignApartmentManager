<?php
include "db_conn.php";


  if(isset($_POST['billing_date']) && isset($_POST['amount'])) {
if (is_numeric($_POST['amount']) && !empty($_POST['detail'])) {
  // code...

  $month = date('Y-m-d',strtotime($_POST['billing_date']));
  $amount = $_POST['amount'];
  $detail = $_POST['detail'];
  $ret=mysqli_query($conn,"select * from users where exitdate IS NULL");
$cnt=1;
while($row=mysqli_fetch_array($ret))
{
$uid = $row['id'];
$newbilling = $conn->query("INSERT INTO billing (billing_date,user_id,amount,detail) VALUES ('$month','$uid','$amount','$detail')");


}
header("Location:billing.php?month=$month");
}
else {
  // code...
  header("Location:billing.php?error=Geçerli miktar ve açıklama giriniz.");
}

}
 ?>
