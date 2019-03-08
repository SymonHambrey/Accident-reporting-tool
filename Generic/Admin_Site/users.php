 <!--  Copyright 2018 Symon Hambrey -->

<?php

  $msg="";

  session_start();

  include "../php/connect.php";

  if(!isset($_SESSION['login'])){
    echo "<script>location.replace('admin_login.php')</script>";
  }

  $stmt_user=$pdo->prepare('SELECT ID, first_name, last_name FROM login_data;');
  $stmt_user->execute();

  $stmt_admin=$pdo->prepare('SELECT ID, first_name, last_name FROM admin_login_data;');
  $stmt_admin->execute();

  $msg=($_GET['msg']);

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

    <div id="modal_delete" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content details_title">
          <div class="modal-title">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h1 class="text-center">Delete<span class="close text-center" title="Close" data-dismiss="modal">&times;</span></h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-body details_body details_title lighter_blue">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="text-center delete_title"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="text-center delete_content"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer modal-content details_title lighter_blue">
          <div class="container">
            <div class="row">
              <div class="col-md-6 text-right" id="yes_btn">
                <button class="btn btn-primary lighter_blue" id="yes_btn">Yes</button>
              </div>
              <div class="col-md-6">
                <button class="btn btn-primary lighter_blue" type="button" id="no_btn" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="page-header">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <h1 class="text_large">User Maintenance</h1>
          </div>
          <div class="col-md-2">
            <button id="back" type="button" class="top_right_button btn btn-primary">
              &lsaquo;&nbsp;Back
            </button>
          </div>
        </div>
      </div>
    </div>

    </br>

    <div class="page-content">
      <div class="container">
        <div class="row title_row title_row_all">
          <div class="col-md-12 title_row title_row_all lighter_blue">
            <h4 class="title_text">Add User</h4>
          </div>
        </div>
        <div class="row title_row title_row_all">
          <div class="col-md-12 title_row title_row_full">
            <form action="../php/user.php" method="post">
              <div class="row align-left">
                <div class="col-md-3">
                  <label class="title_text" for="ID">User ID</label>
                  <input type="text" name="ID" value="" required>
                </div>
                <div class="col-md-3">
                  <label class="title_text" for="first_name">First Name</label>
                  <input type="text" name="first_name" value="" required>
                </div>
                <div class="col-md-3">
                  <label class="title_text" for="last_name">Last Name</label>
                  <input type="text" name="last_name" value="" required>
                </div>
                <div class="col-md-3 text-left">
                  <label class="title_text" for="ad_us">Type?</label>
                  <select class="btn-small lighter_blue title_row" name="ad_us" required>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                  </select>
                  <button class="btn-small btn-primary lighter_blue" type="submit" name="button">Add User</button>
                </div>
              </div>
              </br>
            </form>
          </div>
        </div>
      </div>
    </div>

    </br>
    <div class="container">
      <div class="row">
        <?php echo $msg ?>
      </div>
    </div>
    </br>

    <div class="container">

      <div class="row title_row title_row_all">
        <div class="col-md-3 title_row title_row_left lighter_blue">
          <p class="title_text align-middle">User ID</p>
        </div>
        <div class="col-md-4 title_row title_row_mid lighter_blue">
          <p class="title_text align-middle">Name</p>
        </div>
        <div class="col-md-1 title_row title_row_mid lighter_blue">
          <p class="title_text align-middle">Type</p>
        </div>
        <div class="col-md-2 title_row title_row_mid lighter_blue">
          <p class="title_text align-middle">Reset Password</p>
        </div>
        <div class="col-md-2 title_row title_row_right lighter_blue">
          <p class="title_text align-middle">Delete User</p>
        </div>
      </div>

      <div class="row title_row title_row_all">
        <?php
          while ($row=$stmt_admin->fetch()){
            echo '<div class="col-md-3 title_row title_row_left">';
            echo '<div class="message_text" id="admin_"'.$row['ID'].'>'.$row['ID'].'</div></div>';
            echo '<div class="col-md-4 title_row title_row_mid">';
            echo '<div class="message_text query_content">'.$row['first_name'].' '.$row['last_name'].'</div></div>';
            echo '<div class="col-md-1 title_row title_row_mid">';
            echo '<div class="message_text query_content">Admin</div></div>';
            echo '<div class="col-md-2 title_row title_row_mid text-center">';
            echo '<p class="message_text" id="reset">';
          ?>
          <form>
            <input class="circle_button reset_button" type="button" id="admn_<?php echo $row['ID']; ?>" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
          </form>
          <?php
            echo '</p></div>';
            echo '<div class="col-md-2 title_row title_row_right text-center">';
            echo '<p class="message_text" id="delete">';
          ?>
          <form>
            <input class="circle_button delete_button" type="button" id="admn_<?php echo $row['ID']; ?>" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
          </form>
          <?php
            echo '</p></div>';
          }

          while ($row2=$stmt_user->fetch()){
            echo '<div class="col-md-3 title_row title_row_left">';
            echo '<div class="message_text" id="user_"'.$row2['ID'].'>'.$row2['ID'].'</div></div>';
            echo '<div class="col-md-4 title_row title_row_mid">';
            echo '<div class="message_text query_content">'.$row2['first_name'].' '.$row2['last_name'].'</div></div>';
            echo '<div class="col-md-1 title_row title_row_mid">';
            echo '<div class="message_text query_content">User</div></div>';
            echo '<div class="col-md-2 title_row title_row_mid text-center">';
            echo '<p class="message_text" id="reset">';
          ?>
          <form>
            <input class="circle_button reset_button" type="button" id="user_<?php echo $row2['ID']; ?>" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
          </form>
          <?php
            echo '</p></div>';
            echo '<div class="col-md-2 title_row title_row_right text-center">';
            echo '<p class="message_text" id="delete">';
          ?>
          <form>
            <input class="circle_button delete_button" type="button" id="user_<?php echo $row2['ID']; ?>" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
          </form>
          <?php
            echo '</p></div>';
          }
        ?>
      </div>
    </div>

    <script type="text/javascript" src="../js/admin.js"></script>

  </body>

</html>
