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
           <li><a class="nav-link" href="billing.php">Aidatlandırma</a></li>

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
           <h3><?php echo $row['name'];?>'(n)ın Ödemeleri</h3> <br>

       <div class="row">
                 <div class="col-md-12">
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

                       $billing = $conn->query("SELECT b.*,u.name from billing b inner join users u on u.id = b.user_id  where user_id =$gid order by status asc");
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
                            <?php if($row['status'] == 0): ?>
                            <a href="adminpay.php?id=<?php echo $row['id'];?>">
                           <button class="btn btn-sm btn-outline-primary view_billing" type="button" onClick="return confirm('Borcu ödemek istediğinizden emin misiniz?');">Öde</button> </a>
                            <?php else: ?>
                              <a href="">
                              <button class="btn btn-sm btn-outline-danger view_billing" type="button" style="background-color:red;color:white;" disabled>Ödenmiş</button> </a>
                              <?php endif; ?>
                         </td>
                       </tr>
                       <?php endwhile; ?>
                     </tbody>
                   </table>
             </div>

   </section>
       </div>
     </body>
 </html>
