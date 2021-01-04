<?php
session_start();
include "db_conn.php";
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
        <h4> KARDELEN SİTESİ</h4>
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
      <ul class="nav-links">
        <li>
          <p>
            <a href="logout.php" class="btn btn-info btn-lg">
              <span class="glyphicon glyphicon-log-out"></span> Çıkış Yap
            </a>
          </p>
        </li>
        <li><button type="button" id="surveybtn" class="btn btn-primary" data-toggle="modal" data-target="#modalPoll-1">?</button></li>
      </ul>
    </div>
  </header> <br>
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
      <br><br>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <?php $ret=mysqli_query($conn,"select * from announcement");
      $i=0;
      while($row=mysqli_fetch_array($ret)) {
          $actives = '';
          if($i == 0){
            $actives = 'active';
          }
            ?>
          <div class="carousel-item <?=$actives; ?>">
            <div class="carousel-caption">
              <h1 class="display-5"><?php echo $row['header'];?><br><small><?php echo $row['content'];?></small></h1>
            </div>
          </div>
            <?php $i=$i+1; }?>
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

      <div>
        <h1 class="display-5">MUHİTİMİZDEKİ OLANAKLAR<br><small></small></h1> <br>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Veteriner Kliniği</h2>
            <p class="lead">Küçük dostlarımızın sağlığı ve ihtiyaçlarını karşılamak için 7/24 açık olan sitemize en yakın veteriner kliniği. <br><br> Telefon numarası:(0 216) 305 35 08 </p>
          </div>
          <div class="col-md-5">
            <div class="mapouter">
              <div class="gmap_canvas"><iframe width="350" height="350" id="gmap_canvas" src="https://maps.google.com/maps?q=megavet&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
              <style>
                .mapouter {
                  position: relative;
                  text-align: right;
                  height: 350px;
                  width: 350px;
                }

                .gmap_canvas {
                  overflow: hidden;
                  background: none !important;
                  height: 414px;
                  width: 477px;
                }
              </style>
            </div>
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Aile Sağlık Merkezi</h2>
            <p class="lead">Sitemize en yakın sağlık ocağı. <br><br>Covid-19 sebebiyle <b>maskenizi takmayı unutmayın </b>. </p>
          </div>
          <div class="col-md-5 order-md-1">
            <div class="mapouter">
              <div class="gmap_canvas"><iframe width="350" height="350" id="gmap_canvas" src="https://maps.google.com/maps?q=Maltepe%208%20No'lu&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0"
                  marginwidth="0"></iframe></div>
              <style>
                .mapouter {
                  position: relative;
                  text-align: right;
                  height: 350px;
                  width: 350px;
                }

                .gmap_canvas {
                  overflow: hidden;
                  background: none !important;
                  height: 350px;
                  width: 350px;
                }
              </style>
            </div>
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Süpermarket</h2>
            <p class="lead">İhtiyaçlarınızı karşılayabileceğiniz en yakın süpermarket. <br><br> Açılış Saati:08.00<br>Kapanış Saati:22.00 </p>
          </div>
          <div class="col-md-5">
            <div class="mapouter">
              <div class="gmap_canvas"><iframe width="350" height="350" id="gmap_canvas"
                  src="https://maps.google.com/maps?q=Rammar%20Altay%C3%A7e%C5%9Fme%2C%20kazin%20tunc%20loo%2C%20Atat%C3%BCrk%20Cd.%2077%2FC%20D%3A77%2FC%2C%2034843%20Maltepe%2F%C4%B0stanbul&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0"
                  scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
              <style>
                .mapouter {
                  position: relative;
                  text-align: right;
                  height: 350px;
                  width: 350px;
                }

                .gmap_canvas {
                  overflow: hidden;
                  background: none !important;
                  height: 350px;
                  width: 350px;
                }
              </style>
            </div>
          </div>
        </div>

        <hr class="featurette-divider">

        <p>
        </p> <br><br><br>
      </div>

    </div>
  </div>
  <div class="row">
    <div class="container md-12">
      <div class="row">
        <div class="row">
          <div class="col-md-4 text-center">

          </div>
        </div>
      </div>



      <!-- Modal: modalPoll Tekli Anket -->
      <div class="modal right fade" id="modalPoll-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
          <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
              <p class="heading lead">Geri Bildirim Anketi
              </p>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">×</span>
              </button>
            </div>

            <!--Body-->
            <div class="modal-body">
              <div class="text-center">
                <i class="far fa-file-alt fa-4x mb-3 animated rotateIn"></i>
                <p>
                  <strong>Fikriniz Önemli</strong>
                </p>
                <p>Haftalık çim biçme sıklığını nasıl buluyorsunuz? <br>
                  <strong style="text-align:center;">Fikrinizi belirtin.</strong>
                </p>
              </div>

              <hr>

              <!-- Radio -->
              <p class="text-center">
                <strong>Derecelendirmeniz</strong>
              </p>
              <div class="form-check mb-4">
                <input class="form-check-input" name="group1" type="radio" id="radio-129" value="option1" checked>
                <label class="form-check-label" for="radio-129">Çok iyi</label>
              </div>

              <div class="form-check mb-4">
                <input class="form-check-input" name="group1" type="radio" id="radio-229" value="option2">
                <label class="form-check-label" for="radio-229">İyi</label>
              </div>

              <div class="form-check mb-4">
                <input class="form-check-input" name="group1" type="radio" id="radio-329" value="option3">
                <label class="form-check-label" for="radio-329">Orta</label>
              </div>
              <div class="form-check mb-4">
                <input class="form-check-input" name="group1" type="radio" id="radio-429" value="option4">
                <label class="form-check-label" for="radio-429">Kötü</label>
              </div>
              <div class="form-check mb-4">
                <input class="form-check-input" name="group1" type="radio" id="radio-529" value="option5">
                <label class="form-check-label" for="radio-529">Çok kötü</label>
              </div>
              <!-- Radio -->


            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
              <a type="button" class="btn btn-primary waves-effect waves-light">Gönder
                <i class="fa fa-paper-plane ml-1"></i>
              </a>
              <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">İptal</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">© 2020 Copyright: Metehan Baş
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>
