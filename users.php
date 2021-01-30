<?php include "db_conn.php";
// for deleting user
if(isset($_GET['id'])) {
  $adminid=$_GET['id'];
  $check =("SELECT b.*,u.name from billing b inner join users u on u.id = b.user_id where user_id = '$adminid' AND status ='0' order by b.id asc");
  $query_run = mysqli_query($conn, $check);
  $rowcount=mysqli_num_rows($query_run);
  if ($rowcount == 0) {
    $date = date('Y-m-d H:i:s');
    $old = mysqli_query($conn,"UPDATE users SET exitdate='$date' WHERE id =$adminid");
}
  else {
    header('Location:users.php?error=Borcu olan kullanıcı silinemez.');
  }



}

// // if($msg)
// // {
// // echo "<script>alert('Üye Silindi.');</script>";
// // }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Yönetici Paneli</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>


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
    </header> <br>
    <div class="row">
      <div class="col-sm-2">

    </div>
      <div class="col-sm-8">
        <div class="content-panel">
    <table class="table table-bordered table-condensed table-hover">
      <h4><i>Üye Detayları</i></h4>

          <form class=""action="oldusers.php" method="post">
            <button style="float:left;;margin-bottom:1%;" class="btn btn-info btn-xs">Eski Üyeleri Gör</button>
          </form>
          <div class="col-sm-4 offset-md-5">
            <?php if (isset($_GET['error'])) { ?>
                       <h4 style="color:red"class="error"><?php echo $_GET['error']; } ?></h4>
          </div>
           <div class="input-group">
  <div class="form-outline">
    <input type="search" name="employee_search" id="employee_search" class="form-control" autocomplete="off" placeholder="Kullanıcı Ara" />
    </div>
  <button type="button" class="btn btn-primary">
    <i class="fa fa-search"></i>
  </button>
</div>
           <br />
        <thead>

        </thead>
        <tbody>
<div id="employee_data"></div>
        </tbody>
    </table>


</div>
      </div>
      </div>

      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    </body>

      </html>
      <script>
      $(document).ready(function(){
       load_data('');
       function load_data(query, typehead_search = 'yes')
       {
        $.ajax({
         url:"fetch.php",
         method:"POST",
         data:{query:query, typehead_search:typehead_search},
         success:function(data)
         {
          $('#employee_data').html(data);
         }
        });
       }

       $('#employee_search').typeahead({
        source: function(query, result){
         $.ajax({
          url:"fetch.php",
          method:"POST",
          data:{query:query},
          dataType:"json",
          success:function(data){
           result($.map(data, function(item){
            return item;
           }));
           load_data(query, 'yes');
          }
         });
        }
       });

       $(document).on('click', 'li', function(){
        var query = $(this).text();
        load_data(query);
       });

      });
      </script>
