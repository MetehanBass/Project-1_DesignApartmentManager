<?php include "db_conn.php";
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
      <section id="main-content">
      <section class="wrapper">
        <h3>Kullanıcı Bilgileri</h3> <br>

				<?php

				$userid=$_GET['id'];
				$query = "SELECT * from users where id='".$userid."'";
				$result = mysqli_query($conn, $query) or die ( mysqli_error());
				$row = mysqli_fetch_assoc($result);
				?>
				<div class="row">
	                <div class="col-md-12">
												<div class="tab">
									        <button class="tablinks" onclick="openTab(event, 'profil')" id="defaultOpen">Profil Bilgileri</button>
									        <button class="tablinks" onclick="openTab(event, 'borc')">Borç Ödeme</button>
									        <button class="tablinks" onclick="openTab(event, 'odenmis')">Geçmiş Ödemeler</button>
									      </div><br>

												<div id="profil" class="tabcontent">

									        <div class="col-md-12">
	                    <p align="center" style="color:#F00;"></p>
	                         <form class="form-horizontal style-form" name="form1" method="post" action="user-update.php" onSubmit="">
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
																	<input type="password" class="form-control" name="password" value="" >
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


	                        <div style="margin-left:100px;">
	                        <input type="submit" name="Submit" value="Güncelle" class="btn btn-info" style="margin-left:-7%;"></div>
	                        </form>
	                    </div>
	                    </div>

											<div class="col-md-8 tabcontent" id="borc">
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
            									<th class="">Miktar</th>
            									<th class="">Açıklama</th>
            									<th class="">Durum</th>
            									<th class="text-center">Ödeme</th>
            								</tr>
            							</thead>
            							<tbody>
            								<?php

            								$billing = $conn->query("SELECT b.*,u.name from billing b inner join users u on u.id = b.user_id where user_id =$userid AND status ='0' order by b.id asc");
            									while($row=$billing->fetch_assoc()):
            									?>
                          	<tr>


            									<td class="">
            										 <p> <b><?php echo date("M, Y",strtotime($row['billing_date'])) ?></b></p>
            									</td>
            									<td class="">
            										 <p> İsim: <b><?php echo ucwords($row['name']) ?></b></p>
            									</td>
            									<td class="">
            										 <p class="text-right"> <b><?php echo number_format($row['amount'],2)."₺" ?></b></p>
            									</td>
                              <td class="">
                                 <p class="text-left"> <b><?php echo $row['detail']?></b></p>
                              </td>
            									<td class="">
            										<?php if($row['status'] == 1): ?>
            										 <span class="badge badge-success">Ödenmiş</span>
            										<?php else: ?>
            										 <span class="badge badge-secondary">Ödenmemiş</span>
            										<?php endif; ?>
            									</td>
            									<td class="text-center">
                                 <a href="paydept.php?id=<?php echo $row['id'];?>">
            										<button class="btn btn-sm btn-outline-success view_billing" type="button" onClick="return confirm('Aidatı ödemek istediğinizden emin misiniz?');">Öde</button> </a>
            									</td>
            								</tr>
            								<?php endwhile; ?>
            							</tbody>
            						</table>
											</div>

                      <div class="col-md-8 tabcontent" id="odenmis">
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
                              <th class="">Miktar</th>
                              <th class="">Açıklama</th>
                              <th class="">Durum</th>
                              <th class="text-center">Ödeme Tarihi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php

                            $billing = $conn->query("SELECT b.*,u.name from billing b inner join users u on u.id = b.user_id where user_id =$userid AND status ='1' order by b.id asc");
                              while($row=$billing->fetch_assoc()):
                              ?>
                            <tr>


                              <td class="">
                                 <p> <b><?php echo date("M, Y",strtotime($row['billing_date'])) ?></b></p>
                              </td>
                              <td class="">
                                 <p> İsim: <b><?php echo ucwords($row['name']) ?></b></p>
                              </td>
                              <td class="">
                                 <p class="text-right"> <b><?php echo number_format($row['amount'],2)."₺" ?></b></p>
                              </td>
                              <td class="">
                                 <p class="text-left"> <b><?php echo $row['detail']?></b></p>
                              </td>
                              <td class="">
                                <?php if($row['status'] == 1): ?>
                                 <span class="badge badge-success">Ödenmiş</span>
                                <?php else: ?>
                                 <span class="badge badge-secondary">Ödenmemiş</span>
                                <?php endif; ?>
                              </td>
                              <td class="">
                                 <p> <b><?php echo $row['payment_date'] ?></b></p>
                              </td>

                            </tr>
                            <?php endwhile; ?>
                          </tbody>
                        </table>

											</div>


	                    </div>
	                </div>
	            </div>
	            </div>


</section>



    </div>




		<script type="text/javascript" src="./js/manager.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>

  </html>
