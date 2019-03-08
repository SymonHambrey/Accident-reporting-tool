<!--  Copyright 2018 Symon Hambrey -->

<?php
  session_start();

  if(!isset($_SESSION['login'])){
    echo "<script>location.replace('admin_login.php')</script>";
  }

  include "../php/connect_report.php";

  $stmt=$pdo->prepare('SELECT * FROM mail');
  $stmt->execute();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>IRS Administration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans">
    <link rel="stylesheet" href="../css/main.css"/>
    <link rel="stylesheet" href="../css/modal.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  </head>

  <?php
    try{

      include "../php/connect_report.php";

      $acc_rep=$pdo->prepare('SELECT * FROM accReport');
      $acc_rep->execute();

      $nea_rep=$pdo->prepare('SELECT * FROM nearMiss');
      $nea_rep->execute();

      $con_rep=$pdo->prepare('SELECT * FROM concern');
      $con_rep->execute();
    }
    catch(Exception $error){
      echo 'Error : '.$error->getMessage();
    }

  ?>

    <body>

      <div class="page-header">
        <div class="container">
          <div class="row">
            <div class="col-md-9">
              <h1 class="text_large">Incident Archive</h1>
            </div>
            <div class="col-md-2">
              <button id="back" type="button" class="remove_for_print top_right_button btn btn-primary">
                &lsaquo;&nbsp;Back
              </button>
            </div>
          </div>
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
              if(!is_null($row['archive'])){
                echo '<div class="col-md-2 title_row title_row_left"><p class="message_text">'.date('d/m/Y', strtotime($row['inc_date'])).'</p></div>';
                echo '<div class="col-md-1 title_row title_row_mid"><p class="message_text">'.$row['type'].'</p></div>';
                echo '<div class="col-md-2 title_row title_row_mid"><p class="message_text" id="inc_from_'.$row['report_ID'].'">'.$row['rep_name'].'</p></div>';
                echo '<div class="col-md-5 title_row title_row_mid"><p class="message_text incident_content" id="'.$row['report_ID'].'">'.substr($row['description'],0,50).'...</p></div>';
                echo '<p class="hidden_field" id="inc_show_'.$row['report_ID'].'">'.$row['description'].'</p>';
                echo '<div class="col-md-1 title_row title_row_mid"><p class="message_text">'.$row['riddor'].'</p></div>';
                echo '<div class="col-md-1 title_row title_row_right text-center"><p class="message_text">';
                ?>
                  <form action="details.php?user=<?php echo 'acc_'.$row['report_ID'];?>" method="post">
                    <input type="hidden" name="name" value="<?php echo $row['report_ID']; ?>">
                    <input type="hidden" name="archive" value="true">
                    <input class="circle_button" type="submit" name="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                  </form>
                <?php
                echo '</p></div>';
              }
            }
            while($row=$nea_rep->fetch()){
              if(!is_null($row['archive'])){
                echo '<div class="col-md-2 title_row title_row_left"><p class="message_text">'.date('d/m/Y', strtotime($row['inc_date'])).'</p></div>';
                echo '<div class="col-md-1 title_row title_row_mid"><p class="message_text">'.$row['type'].'</p></div>';
                echo '<div class="col-md-2 title_row title_row_mid"><p class="message_text" id="inc_from_'.$row['report_ID'].'">'.$row['rep_name'].'</p></div>';
                echo '<div class="col-md-5 title_row title_row_mid"><p class="message_text incident_content" id="'.$row['report_ID'].'">'.substr($row['description'],0,50).'...</p></div>';
                echo '<p class="hidden_field" id="inc_show_'.$row['report_ID'].'">'.$row['description'].'</p>';
                echo '<div class="col-md-1 title_row title_row_mid"><p class="message_text">no</p></div>';
                echo '<div class="col-md-1 title_row title_row_right text-center"><p class="message_text">';
                ?>
                  <form action="details.php?user=<?php echo 'nea_'.$row['report_ID'];?>" method="post">
                    <input type="hidden" name="name" value="<?php echo $row['report_ID']; ?>">
                    <input type="hidden" name="archive" value="true">
                    <input class="circle_button" type="submit" name="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                  </form>
                <?php
                echo '</p></div>';
              }
            }
            while($row=$con_rep->fetch()){
              if(!is_null($row['archive'])){
                echo '<div class="col-md-2 title_row title_row_left"><p class="message_text">'.date('d/m/Y', strtotime($row['inc_date'])).'</p></div>';
                echo '<div class="col-md-1 title_row title_row_mid"><p class="message_text">'.$row['type'].'</p></div>';
                echo '<div class="col-md-2 title_row title_row_mid"><p class="message_text" id="inc_from_'.$row['report_ID'].'">'.$row['rep_name'].'</p></div>';
                echo '<div class="col-md-5 title_row title_row_mid"><p class="message_text incident_content" id="'.$row['report_ID'].'">'.substr($row['description'],0,50).'...</p></div>';
                echo '<p class="hidden_field" id="inc_show_'.$row['report_ID'].'">'.$row['description'].'</p>';
                echo '<div class="col-md-1 title_row title_row_mid"><p class="message_text">no</p></div>';
                echo '<div class="col-md-1 title_row title_row_right text-center"><p class="message_text">';
                ?>
                  <form action="details.php?user=<?php echo 'con_'.$row['report_ID'];?>" method="post">
                    <input type="hidden" name="name" value="<?php echo $row['report_ID']; ?>">
                    <input type="hidden" name="archive" value="true">
                    <input class="circle_button" type="submit" name="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                  </form>
                <?php
                echo '</p></div>';
              }
            }
          ?>
        </div>
      </div>

      <script type="text/javascript" src="../js/admin.js"></script>

    </body>

  </html>
