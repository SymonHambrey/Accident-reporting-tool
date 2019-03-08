<?php

/* Copyright 2018, Symon Hambrey, All rights reserved */

include 'setpass.php';

?>

<!DOCTYPE html>
<html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Incident Reporting System</title>
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
          <h1 class="text_large">Incident Reporting System</h1>
        </div>
        <div class="col-md-2">
          <button type="button" class="top_right_button btn btn-primary" data-toggle="modal" data-target=".contact">
            Contact Administrator
          </button>
        </div>
      </div>
    </div>
  </div>

  </br></br>

  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <p class="text_medium">Passwords must be minimum 8 characters long</p>
      </div>
    </div>
  </div>

  <form action="" method="post">
    <div class="row">
      <div class="col-sm-4 text-right">
        <label class="label-text" for="newpass">Enter new password&nbsp;</label>
      </div>
      <div class="col-sm-6">
        <input id="newpassword" type="password" name="newpass"/>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 text-right">
        <label class="label-text" for="confirm">Confirm new password&nbsp;</label>
      </div>
      <div class="col-sm-6">
        <input id="confpassword" type="password" name="confirm"/>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-4 text-right" >
        <button class="btn_blue btn btn-primary" type="button" id="cancel">Cancel</button>
      </div>
      <div class="col-sm-6">
        <button class="btn_blue btn btn-primary" type="submit" name="submit" id="submit_new">Submit</button>
      </div>
    </div>
  </form>
  <br>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-8">
      <?php echo $error ?>
    </div>
  </div>


  <div class="page-footer">
    <a href="https://hambreyhome.ddns.net/index.html" class="text_small">&copy; Symon Hambrey 2018</a>
  </div>

    <script src="../js/home.js"></script>

  </body>

</html>
