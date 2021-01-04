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
      <a href="index.php" style="text-decoration:none;font-weight: 400;margin:7% 7%;">
        <h4>KARDELEN SİTESİ</h4>
      </a>
    </div>
  </header>
  <br><br><br>
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-4">
      <div class="list-group" id="login-form">
        <div id="login">
          <h3 class="text-center text-white pt-5"></h3>
          <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
              <div id="login-column" class="col-md-8">
                <div id="login-box" class="col-md-8">
                  <form  name="f1" id="login-form" class="form" action="login.php" onsubmit = "return validation()" method="POST">
                    <?php if (isset($_GET['error'])) { ?>
          	      		<p class="error"><?php echo $_GET['error']; ?></p>
          	      	<?php } ?>
                    <h4 class="text-center text-info">Giriş Yap</h4>
                    <div class="form-group">
                      <input type="text" name="uname" id="user" class="form-control" placeholder="Kullanıcı Adı">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" id="pass" class="form-control" placeholder="Parola">
                    </div>
                    <div class="form-group">
                      <label for="remember-me" class="text-info"><span>Beni Hatırla</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                      <input  type="submit" name="submit" id="btn" class="btn btn-info btn-md" value="Giriş">
                    </div>
                    <div id="register-link" class="text-left">
                      <a href="admin.php" class="text-info">Yönetici Girişi</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4" style="margin-left:5%;">
      <h1 class="display-4"><strong>Kardelen Sitesi</strong> <br><br><small style=font-size:0.5em; >Sitemiz hakkındaki bilgilendirmeleri ve aidat bilgilerini görmenizi sağlar.</small></h1> <br>
    </div>
  </div>


    <script type="text/javascript" src="./js/manager.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
