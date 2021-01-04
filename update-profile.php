<?php include "db_conn.php";
$gid=$_GET['id'];
$query = "SELECT * from users where id='".$gid."'";
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

 // //Checking session is valid or not
 // if (strlen($_SESSION['id']==0)) {
 //   header('location:logout.php');
 //   } else{

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Yönetici Paneli</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
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
    </header>

    <div class="row">
      <div class="col-sm-2">
      </div>
      <div class="col-sm-8">

        <section id="main-content">
        <section class="wrapper">
          <h3><?php echo $row['name'];?>'(n)ın Bilgileri.</h3>

      <div class="row">
                <div class="col-md-12">
                    <div class="content-panel">

                    <p align="center" style="color:#F00;"></p>
                         <form class="form-horizontal style-form" name="form1" method="post" action="update.php" onSubmit="">
                        <input type="hidden" name="update_id" id="update_id" value="<?php echo $row['id']; ?>">
                         <p style="color:#F00"></p>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:20px;">Kullanıcı adı </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" value="<?php echo $row['user_name'];?>" >
                            </div>
                        </div>

												<div class="form-group">
														<label class="col-sm-2 col-sm-2 control-label" style="padding-left:20px;">Parola </label>
														<div class="col-sm-10">
																<input type="text" class="form-control" name="password" value="<?php echo $row['password'];?>" >
														</div>
												</div>

                            <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:20px;">İsim</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" >
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="padding-left:20px;">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="padding-left:20px;">Telefon Numarası</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="phonenum" value="<?php echo $row['phonenum'];?>" >
                    </div>
                    </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="padding-left:20px;">Telefon Numarası 2</label>
                        <div class="col-sm-10">
                    <input type="text" class="form-control" name="phonenum1" value="<?php echo $row['phonenum1'];?>" >
                  </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:20px;">Blok</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="block" value="<?php echo $row['block'];?>" >
                </div>
            </div>

              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:20px;">Daire</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="flat" value="<?php echo $row['flat'];?>" >
                </div>
              </div>

                            <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:20px;">Aidat Borcu </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="dept" value="<?php echo $row['dept'];?>" >
                            </div>
                        </div>
                            <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:20px;">Ekstra Borç </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="extradept" value="<?php echo $row['extradept'];?>" >
                            </div>
                        </div>

                        <div style="margin-left:100px;">
                        <input type="submit" name="Submit" value="Güncelle" class="btn btn-info" style="margin-left:-7%;"></div>
                        </form>
                    </div>
                </div>
            </div>

  </section>
      </div>
    </body>
</html>
