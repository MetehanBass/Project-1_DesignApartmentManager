<?php
include "db_conn.php";
session_start();
$month = date('Y-m');

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
        <li><a class="nav-link" href="dues.php">Gelir/Gider</a></li>
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
  <br>
  <div class="row">
    <div class="col-sm-2 offset-md-5">
      <div class="col-md-2" id = "container" style = "width: 550px; max-height: 425px; margin-left:-30%;">
    </div>
    </div>


    <div class="col-sm-10" style="margin-left:5%;margin-top:-5%;">




      <?php
                              $result = mysqli_query($conn, "SELECT SUM(amount) AS amount_sum FROM billing WHERE date_format(billing_date,'%Y-%m') = '$month'");
                              $row = mysqli_fetch_assoc($result);
                              $sum = $row['amount_sum']; // Total debt of this.month

                              $result = mysqli_query($conn, "SELECT SUM(amount) AS paid_sum FROM billing WHERE date_format(billing_date,'%Y-%m') = '$month' AND status ='1' ");
                              $row = mysqli_fetch_assoc($result);
                              $paid = $row['paid_sum']; // Total paid of this.month

                              if($paid == ""){
                                $paid = 0;
                              }

                              $unpaid = $sum-$paid;


                              ?>
                              <script type = 'text/javascript' src = 'https://www.gstatic.com/charts/loader.js'>
                              </script>
                              <script type = 'text/javascript'>
                              google.charts.load('current', {packages: ['corechart']});

                              </script>


              <script language = 'JavaScript'>
                var paid = <?php echo $paid ?>;
                var unpaid = <?php echo $unpaid ?>;
                var sum = <?php echo $sum?>;

                 function drawChart() {
                    // Define the chart to be drawn.
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Browser');
                    data.addColumn('number', 'Percentage');
                    data.addRows([
                       ['Ödenmesi Beklenen Tutar',0],
                       ['Ödenmemiş Tutar', unpaid],
                       ['Chrome',0],
                       ['Ödenmiş Tutar', paid],
                       ['Opera', 0],
                       ['Others', 0]
                    ]);

                    // Set chart options
                    var options = {
                       'title':'<?php echo date('M, Y',strtotime($month)).' Tarihinin Ödeme Grafiği'; ?>',
                       'width':600,
                       'height':425,
                       pieHole: 0.40,
                       'backgroundColor':'transparent',
                       'is3D':true

                    };

                    // Instantiate and draw the chart.
                    var chart = new google.visualization.PieChart(document.getElementById('container'));
                    chart.draw(data, options);
                 }
                  google.charts.setOnLoadCallback(drawChart);
              </script>

      <table class="table table-bordered table-condensed table-hover">
        <h4><i> Gider Duyuruları</i></h4>
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

          <?php
          $ret=mysqli_query($conn,"select * from incomeAnnouncement");


      $cnt=1;
      while($row=mysqli_fetch_array($ret))
        {?>

            <tr>
                <td><?php echo $row['header'];?></td>
                <td><?php echo $row['contact'];?></td>
                <td><?php echo $row['amount']."₺";?></td>
                <td><?php echo $row['anounce_date'];?></td>

            </tr>

            <?php $cnt=$cnt+1;}?>



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
