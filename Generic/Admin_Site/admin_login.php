<!--  Copyright 2018 Symon Hambrey -->

<?php

  session_start();

  if(isset($_SESSION['login'])){
    session_destroy();
  }

  try{
    $msg=($_GET['msg']);

    if(empty($msg)){
      $msg="";
    }
  }
  catch(Exception $error){
  $msg=$error->getMessage();
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>IRS Administration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css"/>
    <link rel="stylesheet" href="../css/modal.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  </head>

  <body>

    <div class="page-header">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <h1 class="text_large">IRS Administrator Login</h1>
          </div>
          <div class="col-md-2">
            <button id="back" type="button" class="top_right_button btn btn-primary">
              &lsaquo;&nbsp;Back
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      </br>
      <form id="loginform" method="post" action="../php/admin_login.php">
        <div class="row">
          <div class="col-sm-2 text-right">
            <label for="user"><strong>Username&nbsp;</strong></label>
          </div>
          <div class="col-sm-6">
            <input type="text" placeholder="Enter Username" name="user" required/>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-2 text-right">
            <label for="pass"><strong>Password&nbsp;</strong></label>
          </div>
          <div class="col-sm-6">
            <input type="password" placeholder="Enter Password" name="pass" required/>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-2"></div>
            <div class="col-sm-6">
              <button class="btn btn-primary" type="submit" name="button">Login</button>
            </div>
      </form>
      </br>
      </div>
      <div class="row">
        <div class="col-sm-6">** Use user 'admin' and password 'testpass' to login to this demonstration **</div>
          <div class="col-sm-6">
            <p><?php echo $msg ?></p>
          </div>
        </div>
    </div>

    <script src="../js/home.js"></script>

  </body>

</html>
