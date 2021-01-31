<?php
//fetch.php
if(isset($_POST["query"]))
{
 $connect = mysqli_connect("localhost", "root", "", "test_db");
 $request = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM users
  WHERE name LIKE '%".$request."%' AND exitdate IS NULL
 ";
 $result = mysqli_query($connect, $query);
 $data =array();
 $html = '';
 $html .= '
  <table class="table table-bordered table-condensed table-hover">

   <thead>
   <tr>
       <th>ID</th>
       <th>Kullanıcı adı</th>
       <th>İsim</th>
       <th>E-posta</th>
       <th>Telefon</th>
       <th>Telefon 2</th>
       <th>Blok</th>
       <th>Daire</th>
       <th>Kayıt tarihi</th>

   </tr>
   </thead>

  ';
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $data[] = $row["name"];
   $html .= '
   <tr>
   <td>'.$row["id"].'</td>
   <td>'.$row["user_name"].'</td>
   <td>'.$row["name"].'</td>
   <td>'.$row["email"].'</td>
   <td>'.$row["phonenum"].'</td>
   <td>'.$row["phonenum1"].'</td>
   <td>'.$row["block"].'</td>
   <td>'.$row["flat"].'</td>
   <td>'.$row["regdate"].'</td>

                   <td style="width:12%;">

                   <a href="user-bill.php?id='.$row["id"].'">
                   <button class="btn btn-success btn-xs editbtn"><i class="fa fa-money"></i></button></a>
          <a href="update-profile.php?id='.$row["id"].'">
          <button class="btn btn-primary btn-xs editbtn"><i class="fa fa-pencil"></i></button></a>

          <a href="users.php?id='.$row["id"].'">
         <button class="btn btn-danger btn-xs" onClick="return confirm("Kullanıcıyı silmek istediğinizden emin misiniz?");"> <i class="fa fa-trash-o "></i></button></a> <?php
       </td>
   </tr>
   ';
  }
 }
 else
 {
  $data = 'No Data Found';
  $html .= '
   <tr>
    <td colspan="3">No Data Found</td>
   </tr>
   ';
 }
 $html .= '</table>';
 if(isset($_POST['typehead_search']))
 {
  echo $html;
 }
 else
 {
  $data = array_unique($data);
  echo json_encode($data);
 }
}

?>
