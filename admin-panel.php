<?php include "db_conn.php";

if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($conn,"delete from request where id='$adminid'");
}

if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg1=mysqli_query($conn,"delete from announcement where id='$adminid'");

if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg2=mysqli_query($conn,"delete from incomeAnnouncement where id='$adminid'");
}
}


$page1=1;
if(isset($_GET['page'])){
$page =$_GET['page'];

if($page =="" || $page =="1"){
  $page1=0;
}
else{
  $page1 = ($page*9)-9;
}
}


?>

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
        <li><a class="nav-link" href="billing.php">Aidatlandırma</a></li>

      </ul>
    </nav>
    <div class="cart" style="margin-top:1%;">
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
      <div class="row mb-3">
        <div class="col-xl-3 col-sm-6 py-2">
          <div class="card bg-success text-white h-100">
            <div class="card-body bg-success">
              <div class="rotate">
                <i class="fa fa-user fa-4x"></i>
              </div>
              <h6 class="text-uppercase">Üyeler </h6>
              <?php
              $query = "SELECT id FROM users WHERE exitdate IS NULL ORDER BY id";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_num_rows($query_run);
              echo '<h1> ' . $row . '</h1>';
              ?>
            </div>
          </div>
        </div>
         <div class="col-xl-3 col-sm-6 py-2">
                <div class="card text-white bg-danger h-100">
                    <div class="card-body bg-danger">
                        <div class="rotate">
                            <i class="fa fa-list fa-4x"></i>
                        </div>
                        <h6 class="text-uppercase">İstek/Şikayetler</h6>
                        <?php
                        $query = "SELECT id FROM request ORDER BY id";
                        $query_run = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($query_run);
                        echo '<h1> ' . $row . '</h1>';
                        ?>

                    </div>
                </div>
            </div>
      <!-- <div class="col-xl-3 col-sm-6 py-2"> -->
                <!-- <div class="card text-white bg-info h-100"> -->
                    <!-- <div class="card-body bg-info">
                        <div class="rotate">
                            <i class="fa fa-try fa-4x"></i>
                        </div>
                        <h6 class="text-uppercase">Güncel Aylık Aidat Geliri</h6> -->
                      <?php
                        // $result = mysqli_query($conn, 'SELECT SUM(dept) AS dept FROM users');
                        // $row = mysqli_fetch_assoc($result);
                        // $sum = $row['dept'];
                        //
                        // $query = "SELECT id FROM users WHERE flat > 4";
                        // $query_run = mysqli_query($conn, $query);
                        // $numberOfMembers = mysqli_num_rows($query_run);
                        //
                        // $query4 = "SELECT id FROM users Where flat < 5";
                        // $query_run4 = mysqli_query($conn, $query4);
                        // $row4 = mysqli_num_rows($query_run4);
                        //
                        // $Income = ($numberOfMembers *  250)  + ($row4 * 150) - $sum;
                         // echo '<h1> ' . $Income . '</h1>';
                         ?>
                       <!-- </h1> -->
                    <!-- </div>
                </div>
            </div> -->


      </div> <br><br><br><br>
      <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Ablok')" id="defaultOpen">Tüm Ödemeler</button>
        <button class="tablinks" onclick="openTab(event, 'Bblok')">İstek/Şikayet</button>
        <button class="tablinks" onclick="openTab(event, 'Cblok')">Duyuru Ekle</button>
        <button class="tablinks" onclick="openTab(event, 'Gelirgider')">Gelir Gider</button>
        <button class="tablinks" onclick="openTab(event, 'Odemeler')">Üye Ekle</button>
      </div><br>


      <?php

        if (isset($_POST['submit']) && !empty($_POST['uname']) && !empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['phonenum']) && !empty($_POST['block'])
                                    && !empty($_POST['email']) && !empty($_POST['flat'])) {
          $user_name = $_POST['uname'];
          $name = $_POST['name'];
          $password = $_POST['password'];
          $password=$_POST['password'];
          $password = md5($password);
          $phonenum = $_POST['phonenum'];
          $phonenum1 = $_POST['phonenum1'];
          $email = $_POST['email'];
          $flat = $_POST['flat'];
          $block = $_POST['block'];
          $date = date('Y-m-d H:i:s');

          if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	              header("Location:admin-panel.php?error=Geçersiz E-Posta adresi.");
              }

              else {

          $sql = "INSERT INTO users (user_name, name, password, block,phonenum, phonenum1, email, flat , regdate) VALUES ('$user_name', '$name', '$password','$block','$phonenum','$phonenum1','$email', '$flat', '$date')";


            if ($conn->query($sql) === TRUE) {
              echo "Yeni kullanıcı oluşturuldu.!<br />";
            } else {
              echo "Kullanıcı oluşturulamadı.<br />";
            }
            header('location:admin-panel.php');


        }
        }

        ?>


      <div id="Ablok" class="tabcontent">


    <table class="table table-bordered table-condensed table-hover">
      <!-- <colgroup>
        <col width="2%">
        <col width="10%">
        <col width="10%">
        class="btn btn-primary btn-block"
        <col width="15%">
        <col width="20%">
        <col width="15%">
        <col width="10%">
      </colgroup> -->
      <thead>
        <tr>

          <th class="">Tarih</th>
          <th class="">Kullanıcı</th>
          <th class="">Miktarı</th>
          <th class="">Detay</th>
          <th class="">Durum</th>
          <th class="">Ödeme Tarihi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $billing = $conn->query("SELECT b.*,u.name,u.phonenum from billing b inner join users u on u.id = b.user_id where status='1' order by payment_date desc limit $page1,9");
        $billingcounter = $conn->query("SELECT b.*,u.name,u.phonenum from billing b inner join users u on u.id = b.user_id where status='1' order by payment_date desc");
        $count = mysqli_num_rows($billingcounter);


        $a =$count/10;
        $a = ceil($a);



          while($row=$billing->fetch_assoc()):
          ?>
        <tr>


          <td class="">
             <p> <b><?php echo date("M, Y",strtotime($row['billing_date'])) ?></b></p>
          </td>
          <td class="">
             <p> İsim: <b><?php echo ucwords($row['name']) ?></b></p>
             <p> İletişim: <b><?php echo ucwords($row['phonenum']) ?></b></p>
          </td>
          <td class="">
             <p class="text-left"> <b><?php echo number_format($row['amount'],2)."₺" ?></b></p>
          </td>
          <td class="">
             <p class="text-left"> <b><?php echo $row['detail']?></b></p>
          </td>
          <td class="">
            <?php if($row['status'] == 1): ?>
             <span class="badge badge-success">Ödenmiş</span>
            <?php else: ?>
             <span class="badge badge-secondary">Ödenmemiş  </span>
            <?php endif; ?>
          </td>
          <td class="">
             <p class="text-left"> <b><?php echo ($row['payment_date'])?></b></p>
          </td>

        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <?php
    for($b=0;$b < $a;$b++) {
    ?> <a href="admin-panel.php?page=<?php echo $b+1; ?>" style="text-decoration:none;"><?php echo $b+1; ?></a> <?php
    }
     ?>
      </div>

      <div style="overflow-x: auto;" id="Bblok" class="tabcontent">
        <table class="table table-bordered table-condensed table-hover">
          <h4><i>İstek / Şikayetler</i></h4>
          <hr><br>
            <thead>
            <tr>
                <th>E-Posta</th>
                <th>İsim</th>
                <th>İstek/Şikayet</th>
            </tr>
            </thead>
            <tbody>
            <?php $ret=mysqli_query($conn,"select * from request");
        $cnt=1;
        while($row=mysqli_fetch_array($ret))
        {?>
            <tr>

                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['request'];?></td>
                <td style="width:1em;">

                   <a href="admin-panel.php?id=<?php echo $row['id'];?>">
                   <button class="btn btn-danger btn-xs" onClick="return confirm('Talebi/Şikayeti silmek istediğinizden emin misiniz?');"><i class="fa fa-trash-o "></i></button></a>
                </td>
            </tr>
            <?php $cnt=$cnt+1; }?>

            </tbody>
        </table>
      </div>

      <?php
      if (isset($_POST['submit']) && !empty($_POST['header']) && !empty($_POST['content'])) {
        $header = $_POST['header'];
        $content = $_POST['content'];


        $sql1 = "INSERT INTO announcement (header, content) VALUES ('$header', '$content')";


          if ($conn->query($sql1) === TRUE) {
            echo "Duyuru Oluşturuldu.!<br />";
          } else {
            echo "Duyuru Oluşturulamadı.<br />";
          }
          // header('location:admin-panel.php');



      }


        ?>

      <div id="Cblok" class="tabcontent">
        <div class="col-sm-4">
          <form class = "form-signin" role = "form"
             action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
             ?>" method = "post">
        <div class="form-group row">
          <label><p style="color:red;display:inline;">*</p></label>
          <div class="col-sm-10">
            <input class="form-control"  type="text" name="header" value="" placeholder="Başlık" size="20" required>
          </div>
        </div>
        <div class="form-group row">
          <label><p style="color:red;display:inline;">*</p></label>
          <div class="col-sm-10">
            <input style="width:250%;" class="form-control"  type="text" name="content" value="" placeholder="İçerik" size="20" required>
          </div>
        </div>
        <div class="col-sm-10" style="margin-left:-2%;">
          <button type="submit" value="Ekle" class="btn btn-primary" name="submit">Duyuru Ekle</button>
        </div>
      </form>
    </div> <br><br>
      <table class="table table-bordered table-condensed table-hover">
        <h4><i>Güncel Duyurular</i></h4>
        <hr><br>
          <thead>
          <tr>
              <th>Başlık</th>
              <th>İçerik</th>
          </tr>
          </thead>
          <tbody>
          <?php $ret=mysqli_query($conn,"select * from announcement");
      $cnt=1;
      while($row=mysqli_fetch_array($ret))
      {?>
          <tr>

              <td><?php echo $row['header'];?></td>
              <td><?php echo $row['content'];?></td>
              <td style="width:1em;">

                 <a href="admin-panel.php?id=<?php echo $row['id'];?>">
                 <button class="btn btn-danger btn-xs" onClick="return confirm('Duyuruyu silmek istediğinizden emin misiniz?');"><i class="fa fa-trash-o "></i></button></a>
              </td>
          </tr>
          <?php $cnt=$cnt+1; }?>

          </tbody>
      </table>

      </div>

      <?php
      if (isset($_POST['submit']) && !empty($_POST['header']) && !empty($_POST['amount'])) {
        $header = $_POST['header'];
        $header = $_POST['contact'];
        $date = date('Y-m-d H:i:s');
        $amount = $_POST['amount'];


        $sql2 = "INSERT INTO incomeAnnouncement (header,contact,anounce_date,amount) VALUES ('$header','$contact','$date','$amount')";


          if ($conn->query($sql2) === TRUE) {
            echo "";
          } else {
            echo "Duyuru Oluşturulamadı.<br />";
          }
          // header('location:admin-panel.php');



      }


        ?>

      <div id="Gelirgider" class="tabcontent">
        <div class="col-sm-4">

          <div class="col-sm-8">
            <form class = "form-signin" role = "form"
               action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
               ?>" method = "post">
          <div class="form-group row">
            <label><p style="color:red;display:inline;">*</p></label>
            <div class="col-sm-10">
              <input style="width:250%;" class="form-control"  type="text" name="header" value="" placeholder="Duyuru Detayı" size="20" required>
            </div>
          </div>
          <div class="form-group row">
            <label><p style="color:red;display:inline;">*</p></label>
            <div class="col-sm-10">
              <input style="width:150%;" class="form-control"  type="text" name="contact" value="" placeholder="İletişim Ekle" size="20" required>
            </div>
          </div>
          <div class="form-group row">
            <label><p style="color:red;display:inline;">*</p></label>
            <div class="col-sm-10">
              <input style="" class="form-control"  type="text" name="amount" value="" placeholder="Miktar" size="20" required>
            </div>
          </div>
          <div class="col-sm-10" style="margin-left:-2%;">
            <button type="submit" value="Ekle" class="btn btn-primary" name="submit">Gider Duyurusu Ekle</button>
          </div>
        </form>

      </div>


    </div> <br><br>
    <table class="table table-bordered table-condensed table-hover">
      <h4><i>Gider Duyuruları</i></h4>
      <hr><br>
        <thead>
        <tr>
            <th>Başlık</th>
            <th>İletişim</th>
            <th>Miktar</th>
            <th>Tarih</th>
        </tr>
        </thead>
        <tbody>
        <?php $ret=mysqli_query($conn,"select * from incomeAnnouncement order by id desc");
    $cnt=1;
    while($row=mysqli_fetch_array($ret))
    {?>
        <tr>

            <td><?php echo $row['header'];?></td>
            <td><?php echo $row['contact'];?></td>
            <td><?php echo $row['amount']."₺";?></td>
            <td><?php echo $row['anounce_date'];?></td>
            <td style="width:1em;">

               <a href="admin-panel.php?id=<?php echo $row['id'];?>">
               <button class="btn btn-danger btn-xs" onClick="return confirm('Duyuruyu silmek istediğinizden emin misiniz?');"><i class="fa fa-trash-o "></i></button></a>
            </td>
        </tr>
        <?php $cnt=$cnt+1; }?>

        </tbody>
    </table>
  </div>
  <div id="Odemeler" class="tabcontent">
    <div class="col-sm-4">
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <form class = "form-signin" role = "form" onsubmit="false"
         action = "" method = "post" >
      <div class="form-group row">
        <label><p style="color:red;display:inline;">*</p></label>
        <div class="col-sm-10">
          <input class="form-control"  type="text" name="uname" value="" placeholder="Kullanıcı Adı" size="20" required>
        </div>
      </div>
      <div class="form-group row">
        <label><p style="color:red;display:inline;">*</p></label>
        <div class="col-sm-10">
          <input class="form-control" type="text" name="name" value="" placeholder="İsim soyisim" size="20" required>
        </div>
      </div>
      <div class="form-group row">
        <label><p style="color:red;display:inline;">*</p></label>
          <div class="col-sm-10">
            <input class="form-control" type="password" name="password" placeholder="Parola" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="En az 1 sayı,1 küçük harf,1 büyük harf ve 7 karakter içermelidir." required>
        </div>
      </div>
    <div class="form-group row">
  <label><p style="color:red;display:inline;">*</p></label>
  <div class="col-sm-10">
    <input class="form-control" type="text" name="email"  value="" placeholder="E-Posta adresi" required>
  </div>
</div>
<div class="form-group row">
  <label><p style="color:red;display:inline;">*</p></label>
  <div class="col-sm-10">
    <input class="form-control" type="text" name="phonenum" value="" placeholder="Telefon Numarası "required>
  </div>
</div>
<div class="form-group row" style="margin-left:-9px;">
  <div class="col-sm-10">
    <input class="form-control" type="text" name="phonenum1" value="" placeholder="Telefon Numarası 2 ">
  </div>
</div>
<div class="form-group row">
  <label><p style="color:red;display:inline;">*</p></label>
  <div class="col-sm-10">
      <select class="form-control" name="block" title="Blok giriniz.(A-B-C)"  required >
        <option value="A">A Blok</option>
        <option value="B">B Blok</option>
        <option value="C">C Blok</option>
      </select>
  </div>
</div>
<div class="form-group row">
  <label><p style="color:red;display:inline;">*</p></label>
  <div class="col-sm-10">
    <select class="form-control" name="flat" required >
      <option value="">Daire</option>
      <option value="1">Daire 1</option>
      <option value="2">Daire 2</option>
      <option value="3">Daire 3</option>
      <option value="4">Daire 4</option>
      <option value="5">Daire 5</option>
      <option value="6">Daire 6</option>
      <option value="7">Daire 7</option>
      <option value="8">Daire 8</option>
      <option value="9">Daire 9</option>
      <option value="10">Daire 10</option>
      <option value="11">Daire 11</option>
      <option value="12">Daire 12</option>
      <option value="13">Daire 13</option>
      <option value="14">Daire 14</option>
      <option value="15">Daire 15</option>
      <option value="16">Daire 16</option>
      <option value="17">Daire 17</option>
      <option value="18">Daire 18</option>
      <option value="19">Daire 19</option>
      <option value="20">Daire 20</option>
    </select>
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-10">
    <button type="submit" value="Ekle" class="btn btn-primary" name="submit">Ekle</button>
  </div>
</div>

</form>
  </div>
  </div>


</div>
      </div>

    </div>

  </div>
  </div>


  <script type="text/javascript" src="./js/manager.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>

</html>
