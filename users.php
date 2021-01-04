<?php include "db_conn.php";
// for deleting user
if(isset($_GET['id'])) {
$adminid=$_GET['id'];
$old = mysqli_query($conn,"INSERT INTO oldusers SELECT * FROM  users WHERE id =$adminid");
$date = date('Y-m-d H:i:s');


}
if(isset($_GET['id'])) {
$adminid=$_GET['id'];
$msg=mysqli_query($conn,"delete from users where id='$adminid'");
$sql1 = "UPDATE oldusers SET exitdate='$date' WHERE id =$adminid ";
$query_run1 = mysqli_query($conn,$sql1);
// // if($msg)
// // {
// // echo "<script>alert('Üye Silindi.');</script>";
// // }
 }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
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



    </div>
      <div class="col-sm-8">
        <div class="content-panel">
    <table class="table table-striped table-advance table-hover">
      <h4><i>Üye Detayları</i></h4>
        <form class="" action="adddeptManuel.php" method="post">

          <button style="float:right; margin-top:1%; margin-bottom:-1%;" class="btn btn-primary btn-xs">Tüm Üyelere Borç Ekle</button>
          <input style="width:10%;float:right; margin-right: 1%;margin-top:1%; margin-bottom:-1%;" type="text" class="form-control" name="manuelDept"id="exampleInputPassword1" placeholder="Borç Ekle">

        </form>

        <form class="" action="adddept.php" method="post">
            <button style="margin-left: 40%; margin-top:1%; margin-bottom:-1%;" class="btn btn-primary btn-xs">Aylık Aidat Ekle</button>
          </form>

          <form class="" action="deldept.php" method="post">
            <button style="margin-right: 5%; margin-top:1%; margin-bottom:-1%;" class="btn btn-danger btn-xs">Aylık Aidat Sil</button>
          </form>
          <form class=""action="oldusers.php" method="post">
            <button style="float:left; margin-top:1%;margin-bottom:-1%;" class="btn btn-info btn-xs">Eski Üyeleri Gör</button>
          </form>
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
            <th>Aidat Borcu</th>
            <th>Ekstra Borç</th>
            <th>Kayıt tarihi</th>

        </tr>
        </thead>
        <tbody>
        <?php $ret=mysqli_query($conn,"select * from users");
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
            <td><?php echo $row['dept']."₺";?></td>
            <td><?php echo $row['extradept']."₺";?></td>
            <td><?php echo $row['regdate'];?></td>
                        <td>

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
