<?php
include "db_conn.php";
session_start();
 ?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">

  <title>KARDELEN SİTESİ</title>
</head>

<body>
  <header>
    <div class="logo-container">
      <a href="home.php" style="text-decoration:none;font-weight: 400;margin:7% 7%;">
        <h4>KARDELEN SİTESİ</h4>
      </a>
    </div>
    <nav>
      <ul class="nav-links">
        <li><a class="nav-link" href="profile.php?id=<?php echo $_SESSION['id'];?>">Profil</a></li>
        <li><a class="nav-link" href="dues.php">Aidat ve Gelir/Gider</a></li>
        <li><a class="nav-link" href="request.php">İstek/Şikayet</a></li>
      </ul>
    </nav>
    <div class="cart">
      <p>
        <a href="index.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Çıkış Yap
        </a>
      </p>
    </div>
  </header>
  <br><br><br><br><br><br>
  <div class="row">
    <div class="col-sm-2">
    </div>
    <?php
     $result = mysqli_query($conn, 'SELECT SUM(dept) AS dept FROM users');
     $row = mysqli_fetch_assoc($result);
     $sum = $row['dept'];
     $result1 = mysqli_query($conn, 'SELECT SUM(extradept) AS extradept FROM users');
     $row1 = mysqli_fetch_assoc($result1);
     $sumextra = $row1['extradept'];

     $query = "SELECT id FROM users WHERE flat > 4";
     $query_run = mysqli_query($conn, $query);
     $numberOfMembers = mysqli_num_rows($query_run);

     $query4 = "SELECT id FROM users Where flat < 5";
     $query_run4 = mysqli_query($conn, $query4);
     $row4 = mysqli_num_rows($query_run4);


     $Income = ($numberOfMembers *  250) + ($row4 * 150) - $sum;

     ?>
    <div class="col-sm-10" style="margin-left:5%;">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

          <div class="carousel-item active">
            <div class="carousel-caption">
              <h1 class="display-5">Aylık Beklenen Aidat Geliri<br> <br> <small><?php echo ($numberOfMembers *  250) + ($row4 * 150)."₺" ?></small></h1>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-caption">
              <h1 class="display-5">Ödenmemiş Ek Gelir<br> <br> <small><?php echo $sumextra."₺"; ?></small></h1>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-caption">
              <h1 class="display-5">Ödenmemiş aidat geliri<br> <br> <small> <?php echo $sum."₺" ?></small></h1>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-caption">
              <h1 class="display-5">Güncel aylık aidat geliri<br> <br> <small> <?php echo $Income."₺" ?></small></h1>
            </div>
          </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <div class="col-sm-10" style="margin-left:5%;">
      <table class="table table-striped table-advance table-hover">
        <h4><i>Son 30 Günlük Giderler</i></h4>
        <hr><br>
          <thead>
          <tr>
              <th>Başlık</th>
              <th>Miktar</th>
          </tr>
          </thead>
          <tbody>
          <?php $ret=mysqli_query($conn,"select * from incomeAnnouncement");
      $cnt=1;
      while($row=mysqli_fetch_array($ret))
      {?>
          <tr>

              <td><?php echo $row['header'];?></td>
              <td><?php echo $row['amount']."₺";?></td>
              <td>
              </td>
          </tr>
          <?php $cnt=$cnt+1; }?>

          </tbody>
      </table>
    </div>


  </div>
  <footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">
    </div>
    <script type="text/javascript" src="./js/manager.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
