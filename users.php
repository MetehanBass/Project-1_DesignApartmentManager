<?php include "db_conn.php";
// for deleting user
if(isset($_GET['id'])) {
  $adminid=$_GET['id'];
  $check =("SELECT b.*,u.name from billing b inner join users u on u.id = b.user_id where user_id = '$adminid' AND status ='0' order by b.id asc");
  $query_run = mysqli_query($conn, $check);
  $rowcount=mysqli_num_rows($query_run);
  if ($rowcount == 0) {
    $date = date('Y-m-d H:i:s');
    $old = mysqli_query($conn,"UPDATE users SET exitdate='$date' WHERE id =$adminid");
}
  else {
    header('Location:users.php?error=Borcu olan kullanıcı silinemez.');
  }



}

// // if($msg)
// // {
// // echo "<script>alert('Üye Silindi.');</script>";
// // }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  

    <title>Yönetici Paneli</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <header>
      <div class="logo-container">
        <a href="admin-panel.php" style="text-decoration:none;font-weight: 400;margin:7% 7%;">
          <h4>KARDELEN SİTESİ</h4>
        </a>
      </div>
      <nav>
        <ul class="nav-links">
          <li><a class="nav-link" href="admin-panel.php">Ana Sayfa</a></li>
          <li><a class="nav-link" href="users.php">Üyeler</a></li>
          <li><a class="nav-link" href="billing.php">Aidatlandırma</a></li>

        </ul>
      </nav>
      <div class="cart"  style="margin-top:1%;">
        <ul class="nav-links">
          <li>
            <p>
              <a href="logout.php" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-log-out"></span> Çıkış Yap
              </a>
            </p>
          </li>
        </ul>
      </div>
    </header> <br>
    <div class="row">
      <div class="col-sm-2">

        <div class="input-group" style="margin-left:5%;margin-top:11%;">
  <div class="form-outline">
    <input id="search-input" type="search" id="" class="form-control" placeholder="Kullanıcı ara"/>
  </div>
  <button style="margin-left:5%;" id="search-button" type="button" class="btn btn-primary" disabled>
    <i class="fa fa-search"></i>
  </button>
</div>


    </div>
      <div class="col-sm-8">
        <div class="content-panel">
    <table class="table table-bordered table-condensed table-hover">
      <h4><i>Üye Detayları</i></h4>

          <form class=""action="oldusers.php" method="post">
            <button style="float:left;;margin-bottom:1%;" class="btn btn-info btn-xs">Eski Üyeleri Gör</button>
          </form>
          <div class="col-sm-4 offset-md-5">
            <?php if (isset($_GET['error'])) { ?>
                       <h4 style="color:red"class="error"><?php echo $_GET['error']; } ?></h4>
          </div>

          <br>



      <br>
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
        <tbody>
        <?php $ret=mysqli_query($conn,"select * from users where exitdate IS NULL");
              $result = mysqli_num_rows($ret);
$cnt=1;
while($row=mysqli_fetch_array($ret))
{?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['user_name'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['phonenum'];?></td>
            <td><?php echo $row['phonenum1'];?></td>
            <td><?php echo $row['block'];?></td>
            <td><?php echo $row['flat'];?></td>
            <td><?php echo $row['regdate'];?></td>
                        <td style="width:8%;">

               <a href="update-profile.php?id=<?php echo $row['id'];?>">
               <button class="btn btn-primary btn-xs editbtn"><i class="fa fa-pencil"></i></button></a>
               <a href="users.php?id=<?php echo $row['id'];?>">
               <button class="btn btn-danger btn-xs" onClick="return confirm('Kullanıcıyı silmek istediğinizden emin misiniz?');"><i class="fa fa-trash-o "></i></button></a>
            </td>
        </tr>
        <?php $cnt=$cnt+1; }?>

        </tbody>
    </table>


</div>
      </div>

      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    </body>
      </html>
