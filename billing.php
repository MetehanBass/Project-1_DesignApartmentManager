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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>KARDELEN SİTESİ</title>
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
    <div class="col-sm-1">
    </div>



    <div class="col-sm-10" style="margin-left:5%;">
      <div class="container-fluid">
      <style>
      	input[type=checkbox]
      {
        /* Double-sized Checkboxes */
        -ms-transform: scale(1.5); /* IE */
        -moz-transform: scale(1.5); /* FF */
        -webkit-transform: scale(1.5); /* Safari and Chrome */
        -o-transform: scale(1.5); /* Opera */
        transform: scale(1.5);
        padding: 10px;
      }
      </style>
      	<div class="col-lg-12">
      		<div class="row mb-4 mt-4">
      			<div class="col-md-12">

      			</div>
      		</div>
      		<div class="row">
      			<!-- FORM Panel -->

      			<!-- Table Panel -->

      			<div class="col-md-12">

      				<div class="card" style="margin-top:-4%;  background-color: #e5eef4 !important;">
      					<div class="card-header">

      						<span class="">
                    <form class="" action="addbill.php" method="post">
                        <h5>&nbspAylık Aidat Listesi  </h5>
                      <div class="col-md-2 offset-md-5">
                					<label for="" class="control-label">Tarih Seçiniz</label>
                  					<input type="month" value="<?php echo isset($_GET['billing_date']) ? date('Y-m',strtotime($_GET['billing_date'].'-01')) :date('Y-m'); ?>" class="form-control" name="billing_date">
                			</div>
                      <div class="col-md-2 offset-md-7" style="margin-top:-4.3em;">
                        <label for="" class="control-label">Miktar</label>
                        <input type="text" class="form-control" name="amount" id="exampleInputPassword1" placeholder="Aidat Miktarı">

                      </div>
                      <div class="col-md-7 offset-md-9" style="margin-top:-2em;">
                        <button style="" class="btn btn-primary btn-block btn-sm col-sm-2" type="" id="new_billing"> <i class="fa fa-plus">&nbsp Aylık Aidat Ekle</i></button>
                      </div>

                      </form>
      				</span>
      					</div>
      					<div class="card-body">
      						<div class="row form-group">
                    <div class="col-md-8 offset-md-3">
                      <form class="" action="filter-month.php" method="post">
                      <div class="col-md-4 offset-md-3">
                        <label for="" class="control-label">Tarih Seçiniz</label>
                        <input type="month" class="form-control" name="month"  value="<?php echo isset($_GET['month']) ? date('Y-m',strtotime($_GET['month'].'-01')) :date('Y-m'); ?>" required>
                      </div>
                      <div class="col-md-2 offset-md-7" style="margin-top:-4.3em;">
                            <label for="" class="control-label">&nbsp</label>
                            <button class="btn btn-primary btn-block " id="filter" type="">Filtrele</button>
                            </div>
                        </form>
                      </div>

                    </div>
      						<hr>
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
      									<th class="">Aidat Miktarı</th>
      									<th class="">Durum</th>
      									<th class="">Ödeme Tarihi</th>
      									<th class="text-center">Ödeme</th>
      								</tr>
      							</thead>
      							<tbody>
      								<?php
      								$month = isset($_GET['month']) ? date('Y-m',strtotime($_GET['month'].'-01')) : date('Y-m') ;
      								$billing = $conn->query("SELECT b.*,u.name,u.phonenum from billing b inner join users u on u.id = b.user_id where date_format(b.billing_date,'%Y-%m') = '$month' order by b.id asc");
      									while($row=$billing->fetch_assoc()):
      									$chk =  $conn->query("SELECT b.*,u.name,u.phonenum from billing b inner join users u on u.id = b.user_id where date(b.billing_date) > '".$month."-01' and b.id != '".$row['id']."' and b.user_id = '".$row['user_id']."' order by date(b.billing_date) asc")->num_rows;
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
      										 <p class="text-right"> <b><?php echo number_format($row['amount'],2)."₺" ?></b></p>
      									</td>
      									<td class="">
      										<?php if($row['status'] == 1): ?>
      										 <span class="badge badge-success">Paid</span>
      										<?php else: ?>
      										 <span class="badge badge-secondary">Unpaid</span>
      										<?php endif; ?>
      									</td>
                        <td class="">
                           <p class="text-left"> <b><?php echo ($row['payment_date'])?></b></p>
                        </td>
      									<td class="text-center">
      										<button class="btn btn-sm btn-outline-primary view_billing" type="button" data-id="<?php echo $row['id'] ?>" >View</button>
      										<?php if($chk <= 0): ?>
      											<button class="btn btn-sm btn-outline-primary edit_billing" type="button" data-id="<?php echo $row['id'] ?>" >Edit</button>
      										<?php endif; ?>
      									</td>
      								</tr>
      								<?php endwhile; ?>
      							</tbody>
      						</table>
      					</div>
      				</div>
      			</div>
      			<!-- Table Panel -->
      		</div>
      	</div>

      </div>
      <style>
      	td{
      		vertical-align: middle !important;
      	}
      	td p{
      		margin: unset
      	}
      	img{
      		max-width:100px;
      		max-height: :150px;
      	}
      </style>

      <script>
      	$('#check_all').click(function(){
      		if($(this).prop('checked') == true)
      			$('[name="checked[]"]').prop('checked',true)
      		else
      			$('[name="checked[]"]').prop('checked',false)
      	})
      	$('[name="checked[]"]').click(function(){
      		var count = $('[name="checked[]"]').length
      		var checked = $('[name="checked[]"]:checked').length
      		if(count == checked)
      			$('#check_all').prop('checked',true)
      		else
      			$('#check_all').prop('checked',false)
      	})
        });
      </script>

    </div>
  </div>
  <footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">© 2020 Copyright: Metehan Baş
    </div>
    <script type="text/javascript" src="./js/manager.js"></script>
    <script type="text/javascript" src="./js/billing.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
