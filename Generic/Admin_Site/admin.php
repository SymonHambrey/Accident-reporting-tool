<!--  Copyright 2018 Symon Hambrey -->

<?php

  session_start();

  if(isset($_SESSION['newpass'])){
    $_SESSION['page']="../Admin_Site/admin.php";
    echo '<script>location.replace("../reports/newpass.php")</script>';
  }
  else if(!isset($_SESSION['login']) || empty($_SESSION['login'])){
    echo '<script>location.replace("admin_login.php")</script>';
  }
  else if(!isset($_SESSION['login']) && !isset($_SESSION['newpass'])){
    echo '<script>location.replace("admin_login.php")</script>';
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

  <?php
    try{

      include "../php/connect_report.php";

      $stmt=$pdo->prepare('SELECT * FROM mail');
      $stmt->execute();

      $acc_rep=$pdo->prepare('SELECT * FROM accReport');
      $acc_rep->execute();

      $nea_rep=$pdo->prepare('SELECT * FROM nearMiss');
      $nea_rep->execute();

      $con_rep=$pdo->prepare('SELECT * FROM concern');
      $con_rep->execute();

      $msg=($_GET['msg']);
      if(empty($msg)){
        $msg="";
      }
    }
    catch(Exception $error){
      echo 'Error : '.$error->getMessage();
    }

  ?>

  <body>

    <div id="modal_details" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content details_title">
            <div class="modal-title">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <h1 class="text-center">Details<span class="close text-center" title="Close" data-dismiss="modal">&times;</span></h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-body details_body details_title">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="detail_title text-center"></div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="detail_content text-center"></div>
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
            <h1 class="text_large">IRS Administrator</h1>
          </div>
          <div class="col-md-2">
            <button type="button" id="return" class="top_right_button btn btn-primary return">
              Return to IRS
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <ul class="nav">
            <li><a  id="no_underline" class="text_small navbar" href="users.php">Users</a></li>
            <li><a  id="no_underline" class="text_small navbar" href="message_archive.php">Message Archive</a></li>
            <li><a  id="no_underline" class="text_small navbar" href="incident_archive.php">Incident Archive</a></li>
            <li><a  id="no_underline" class="text_small navbar return" href="admin_login.php">Logout</a></li>
          </ul>
        </div>
        <div class="col-md-2"><?php echo $msg ?></div>
      </div>
    </div>

    </br>

    <div class="container messages">
      <div class="row">
        <div class="col-md-12">
          <h4>Messages</h4>
        </div>
      </div>
      <div class="row title_row title_row_all">
        <div class="col-md-4 title_row title_row_left lighter_blue">
          <p class="title_text align-middle">From</p>
        </div>
        <div class="col-md-7 title_row title_row_mid lighter_blue">
          <p class="title_text align-middle">Message</p>
        </div>
        <div class="col-md-1 title_row title_row_right lighter_blue">
          <p class="title_text align-middle">Archive</p>
        </div>
      </div>
      <div class="row title_row title_row_all">
        <?php
          while ($row=$stmt->fetch()){
            if(is_null($row['archive'])){
              echo '<div class="col-md-4 title_row title_row_left">';
              echo "<div class='message_text' id='from_".$row['mail_ID']."'>".$row['email']."</div>";
              echo '</div>';
              echo '<div class="col-md-7 title_row title_row_mid title_row_hover">';
              echo '<div class="message_text query_content" id="'.$row['mail_ID'].'">'.substr($row['query'],0,80).'...</div>';
              echo '<div class="hidden_field" id="show_'.$row['mail_ID'].'">'.$row['query'].'</div>';
              echo '</div>';
              echo '<div class="col-md-1 title_row title_row_right text-center">';
              echo '<div class="message_text" id="delete">';
            ?>
            <form action="../php/ark_mail.php?user=<?php echo $row['mail_ID'];?>" method="post">
              <input type="hidden" name="name" value="<?php echo $row['mail_ID']; ?>">
              <input class="circle_button" type="submit" name="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
            </form>
            <?php
              echo '</div>';
              echo '</div>';
            }
          }
        ?>
      </div>
    </div>

    </br>

    <div class="container incident">
      <div class="row">
        <div class="col-md-12">
          <h4>Incidents</h4>
        </div>
      </div>
      <div class="row title_row title_row_all">
        <div class="col-md-2 title_row title_row_left lighter_blue">
          <p class="title_text align-middle">Date</p>
        </div>
        <div class="col-md-1 title_row title_row_mid lighter_blue">
          <p class="title_text align-middle">Type</p>
        </div>
        <div class="col-md-2 title_row title_row_mid lighter_blue">
          <p class="title_text align-middle">Reporter</p>
        </div>
        <div class="col-md-5 title_row title_row_mid lighter_blue">
          <p class="title_text align-middle">Description</p>
        </div>
        <div class="col-md-1 title_row title_row_mid lighter_blue">
          <p class="title_text align-middle">Riddor</p>
        </div>
        <div class="col-md-1 title_row title_row_right lighter_blue">
          <p class="title_text align-middle">Details</p>
        </div>
      </div>
      <div class="row title_row title_row_all">
        <?php
          while($row=$acc_rep->fetch()){
            if(is_null($row['archive'])){
              echo '<div class="col-md-2 title_row title_row_left"><p class="message_text">'.date('d/m/Y', strtotime($row['inc_date'])).'</p></div>';
              echo '<div class="col-md-1 title_row title_row_mid"><p class="message_text">'.$row['type'].'</p></div>';
              echo '<div class="col-md-2 title_row title_row_mid"><p class="message_text" id="inc_from_'.$row['report_ID'].'">'.$row['rep_name'].'</p></div>';
              echo '<div class="col-md-5 title_row title_row_mid title_row_hover"><p class="message_text incident_content" id="'.$row['report_ID'].'">'.substr($row['description'],0,50).'...</p></div>';
              echo '<p class="hidden_field" id="inc_show_'.$row['report_ID'].'">'.$row['description'].'</p>';
              echo '<div class="col-md-1 title_row title_row_mid"><p class="message_text">'.$row['riddor'].'</p></div>';
              echo '<div class="col-md-1 title_row title_row_right text-center"><p class="message_text">';
              ?>
                <form action="details.php?user=<?php echo 'acc_'.$row['report_ID'];?>" method="post">
                  <input type="hidden" name="name" value="<?php echo $row['report_ID']; ?>">
                  <input class="circle_button" type="submit" name="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                </form>
              <?php
              echo '</p></div>';
            }
          }
          while($row=$nea_rep->fetch()){
            if(is_null($row['archive'])){
              echo '<div class="col-md-2 title_row title_row_left"><p class="message_text">'.date('d/m/Y', strtotime($row['inc_date'])).'</p></div>';
              echo '<div class="col-md-1 title_row title_row_mid"><p class="message_text">'.$row['type'].'</p></div>';
              echo '<div class="col-md-2 title_row title_row_mid"><p class="message_text" id="inc_from_'.$row['report_ID'].'">'.$row['rep_name'].'</p></div>';
              echo '<div class="col-md-5 title_row title_row_mid title_row_hover"><p class="message_text incident_content" id="'.$row['report_ID'].'">'.substr($row['description'],0,50).'...</p></div>';
              echo '<p class="hidden_field" id="inc_show_'.$row['report_ID'].'">'.$row['description'].'</p>';
              echo '<div class="col-md-1 title_row title_row_mid"><p class="message_text">no</p></div>';
              echo '<div class="col-md-1 title_row title_row_right text-center"><p class="message_text">';
              ?>
                <form action="details.php?user=<?php echo 'nea_'.$row['report_ID'];?>" method="post">
                  <input type="hidden" name="name" value="<?php echo $row['report_ID']; ?>">
                  <input class="circle_button" type="submit" name="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                </form>
              <?php
              echo '</p></div>';
            }
          }
          while($row=$con_rep->fetch()){
            if(is_null($row['archive'])){
              echo '<div class="col-md-2 title_row title_row_left"><p class="message_text">'.date('d/m/Y', strtotime($row['inc_date'])).'</p></div>';
              echo '<div class="col-md-1 title_row title_row_mid"><p class="message_text">'.$row['type'].'</p></div>';
              echo '<div class="col-md-2 title_row title_row_mid"><p class="message_text" id="inc_from_'.$row['report_ID'].'">'.$row['rep_name'].'</p></div>';
              echo '<div class="col-md-5 title_row title_row_mid title_row_hover"><p class="message_text incident_content" id="'.$row['report_ID'].'">'.substr($row['description'],0,50).'...</p></div>';
              echo '<p class="hidden_field" id="inc_show_'.$row['report_ID'].'">'.$row['description'].'</p>';
              echo '<div class="col-md-1 title_row title_row_mid"><p class="message_text">no</p></div>';
              echo '<div class="col-md-1 title_row title_row_right text-center"><p class="message_text">';
              ?>
                <form action="details.php?user=<?php echo 'con_'.$row['report_ID'];?>" method="post">
                  <input type="hidden" name="name" value="<?php echo $row['report_ID']; ?>">
                  <input class="circle_button" type="submit" name="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                </form>
              <?php
              echo '</p></div>';
            }
          }
        ?>
      </div>
    </div>

    <script type="text/javascript" src="../js/modal.js">

    </script>

  </body>

</html>
