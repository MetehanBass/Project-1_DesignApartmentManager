<?php include "db_conn.php";
session_start();

?>

<!doctype html>
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
        <a href="logout.php" class="btn btn-info btn-lg">
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
    if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['request'])) {
      $email = $_POST['email'];
      $name = $_POST['name'];
      $request = $_POST['request'];


     if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            header("Location:request.php?error=Geçersiz E-Posta adresi.");
         }

         else{





      $sql = "INSERT INTO request (email, name, request) VALUES ('$email', '$name','$request')";


        if ($conn->query($sql) === TRUE) {
          echo "Talep Oluşturuldu.!<br />";
        } else {
          echo "Talep Oluşturulamadı.<br />";
        }
        header('location:request.php');


      }
    }


      ?>


    <div class="col-sm-8" style="margin-left:5%;">
      <h1 class="display-4">Daha iyi bir yönetim <br> <small> için</small><br> <small> Dilek ve şikayetlerinizi bize iletin.</small></h1> <br>
      <form class = "form-signin" role = "form"
         action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
         ?>" method = "post">
           <p id="submit" style="color:red;">Doldurulması gerekli alanlar (*)</p>
           <br>
           <?php if (isset($_GET['error'])) { ?>
             <p id="submit" class="error"><?php echo $_GET['error']; ?></p>
           <?php } ?>
        <div class="form-group col-md-4">
          <label for="exampleFormControlInput1">E-Posta</label><p style="color:red;display:inline;">*</p>
          <input type="text"  name="email"class="form-control" id="exampleFormControlInput1" placeholder="örnek@kardelensite.com"  required>
        </div>
        <div class="form-group col-md-4 ">
          <label for="exampleFormControlInput1">İsim</label><p style="color:red;display:inline;">*</p>
          <input type="text" name="name"class="form-control" id="exampleFormControlInput1" placeholder="Adınız"  required>
        </div>
        <div class="form-group col-md-8">
          <label for="exampleFormControlInput1">Dilek ve Şikayet</label><p style="color:red;display:inline;">*</p>
          <input type="text" name="request" value="" placeholder="" size="60" class="form-control" id="exampleFormControlInput1" required>
        </div>
        <button id="submit" type="submit" value="Ekle" class="btn btn-primary" name="submit" onClick="return confirm('Talebiniz Başarıyla İletildi.');">Gönder</button> <br><br>
      </form> <br>

    </div>
  </div>
  <footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">© 2020 Copyright: Metehan Baş
    </div>
    <script type="text/javascript" src="./js/manager.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
