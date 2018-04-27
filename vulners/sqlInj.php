<?php
session_start();
include '../db/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
      <title>SQL Enjeksiyonu</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <link href="../css/header.css" rel="stylesheet">
          <link href="../css/footer.css" rel="stylesheet">
          <link href="../css/vulner.css" rel="stylesheet">
    </head>
    <body>

      <?php include '../lyt/header.php';?>
      <?php
          if($_SERVER["REQUEST_METHOD"] == "POST") {
            //$myusername = mysqli_real_escape_string($db,$_POST['username']);
            //$mypassword = mysqli_real_escape_string($db,$_POST['pwd']);
              $myusername = $_POST['username'];
              $mypassword = $_POST['pwd'];
              $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
              $result = mysqli_query($db,$sql);
              $count = mysqli_num_rows($result);

              if($count > 0) {
                 $_SESSION['login_user'] = $myusername;
                 include '../lyt/userlogin.php';
              }else {
                echo '
                <div class="container">
                    <div class="row">
                      <div class="col-lg-3">
                      </div>
                      <div class="col-lg-6">
                          <div class="vulner">
                              <form class="form-horizontal" method = "post">
                                 <div class="form-group">
                                   <label class="control-label col-sm-2" for="userName">Kullanıcı Adı:</label>
                                   <div class="col-sm-6">
                                      <input type="text" class="form-control" name="username" placeholder="Kullanıcı Adı" required="required">
                                   </div>
                                 </div>
                                 <div class="form-group">
                                   <label class="control-label col-sm-2" for="pwd">Şifre:</label>
                                   <div class="col-sm-6">
                                     <input type="password" class="form-control" name="pwd" placeholder="Şifre" required="required">
                                   </div>
                                 </div>

                                 <div class="form-group">
                                   <div class="col-sm-offset-2 col-sm-10">
                                     <p>Hatalı kullanıcı adı veya şifre!</p><button type="submit" class="btn btn-default">Giriş</button>
                                   </div>
                                 </div>
                              </form>
                            </div>
                      </div>
                      <div class="col-lg-3">
                      </div>
                    </div>
                  </div>';
              }
          }else{
              echo '
              <div class="container">
                  <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                        <div class="vulner">
                            <form class="form-horizontal" method = "post">
                               <div class="form-group">
                                 <label class="control-label col-sm-2" for="userName">Kullanıcı Adı:</label>
                                 <div class="col-sm-6">
                                    <input type="text" class="form-control" name="username" placeholder="Kullanıcı Adı" required="required">
                                 </div>
                               </div>
                               <div class="form-group">
                                 <label class="control-label col-sm-2" for="pwd">Şifre:</label>
                                 <div class="col-sm-6">
                                   <input type="password" class="form-control" name="pwd" placeholder="Şifre" required="required">
                                 </div>
                               </div>

                               <div class="form-group">
                                 <div class="col-sm-offset-2 col-sm-10">
                                   <button type="submit" class="btn btn-default">Giriş</button>
                                 </div>
                               </div>
                            </form>
                          </div>
                    </div>
                    <div class="col-lg-3">
                    </div>
                  </div>
                </div>';



          }
      ?>



    <?php include '../lyt/footer.php';?>

    </body>
</html>
