<?php

/* Copyright 2018, Symon Hambrey, All rights reserved */

  require "connect_report.php";

  $from=($_POST['from_page']);

  $inc_date=($_POST['acc_date']);
  $screen_date=strtotime($inc_date);

  $inc_name=($_POST['acc_name']);
  $inc_hsnm=($_POST['acc_houseno']);
  $inc_strt=($_POST['acc_street']);
  $inc_town=($_POST['acc_town']);
  $inc_pscd=($_POST['acc_postcode']);
  $inc_hsno=($_POST['acc_homeno']);
  $inc_mono=($_POST['acc_mobile']);

  $rep_name=($_POST['rep_name']);
  $rep_hsnm=($_POST['rep_houseno']);
  $rep_strt=($_POST['rep_street']);
  $rep_town=($_POST['rep_town']);
  $rep_pscd=($_POST['rep_postcode']);
  $rep_hsno=($_POST['rep_homeno']);
  $rep_mono=($_POST['rep_mobile']);

  $location=($_POST['location']);

  $injury=($_POST['inj_desc']);
  $cause=($_POST['cau_desc']);
  $descrip=($_POST['inc_desc']);
  $riddor=($_POST['riddor']);

  if(!empty($riddor)){
    $riddor="Yes";
  }
  else{
    $riddor="No";
  }
  try{
    if($from=='Accident'){
      $stmt=$pdo->prepare('INSERT INTO accReport(type, inc_date, inc_name, inc_hsnm, inc_strt, inc_town, inc_pscd, inc_hsno, inc_mono, rep_name, rep_hsmn, rep_strt, rep_town, rep_pscd, rep_hsno, rep_mono, location, injury, cause, description, riddor) VALUES (:type, :icdt, :icne, :ichm, :icst, :ictn, :icpd, :icho, :icmo, :rpne, :rphm, :rpst, :rptn, :rppd, :rpho, :rpmo, :locn, :ijry, :caus, :dscr, :ridd)');
      $stmt->bindParam(':type', $from);
      $stmt->bindParam(':icdt', $inc_date);
      $stmt->bindParam(':icne', $inc_name);
      $stmt->bindParam(':ichm', $inc_hsnm);
      $stmt->bindParam(':icst', $inc_strt);
      $stmt->bindParam(':ictn', $inc_town);
      $stmt->bindParam(':icpd', $inc_pscd);
      $stmt->bindParam(':icho', $inc_hsno);
      $stmt->bindParam(':icmo', $inc_mono);
      $stmt->bindParam(':rpne', $rep_name);
      $stmt->bindParam(':rphm', $rep_hsnm);
      $stmt->bindParam(':rpst', $rep_strt);
      $stmt->bindParam(':rptn', $rep_town);
      $stmt->bindParam(':rppd', $rep_pscd);
      $stmt->bindParam(':rpho', $rep_hsno);
      $stmt->bindParam(':rpmo', $rep_mono);
      $stmt->bindParam(':locn', $location);
      $stmt->bindParam(':ijry', $injury);
      $stmt->bindParam(':caus', $cause);
      $stmt->bindParam(':dscr', $descrip);
      $stmt->bindParam(':ridd', $riddor);
      $stmt->execute();
    }
    else if($from=='Near Miss'){
      $stmt=$pdo->prepare('INSERT INTO nearMiss(type, inc_date, rep_name, rep_hsmn, rep_strt, rep_town, rep_pscd, rep_hsno, rep_mono, location, cause, description) VALUES (:type, :icdt, :rpne, :rphm, :rpst, :rptn, :rppd, :rpho, :rpmo, :locn, :caus, :dscr)');
      $stmt->bindParam(':type', $from);
      $stmt->bindParam(':icdt', $inc_date);
      $stmt->bindParam(':rpne', $rep_name);
      $stmt->bindParam(':rphm', $rep_hsnm);
      $stmt->bindParam(':rpst', $rep_strt);
      $stmt->bindParam(':rptn', $rep_town);
      $stmt->bindParam(':rppd', $rep_pscd);
      $stmt->bindParam(':rpho', $rep_hsno);
      $stmt->bindParam(':rpmo', $rep_mono);
      $stmt->bindParam(':locn', $location);
      $stmt->bindParam(':caus', $cause);
      $stmt->bindParam(':dscr', $descrip);
      $stmt->execute();
    }
    else if($from=='Concern'){
      $stmt=$pdo->prepare('INSERT INTO concern(type, inc_date, rep_name, rep_hsmn, rep_strt, rep_town, rep_pscd, rep_hsno, rep_mono, location, description) VALUES (:type, :icdt, :rpne, :rphm, :rpst, :rptn, :rppd, :rpho, :rpmo, :locn, :dscr)');
      $stmt->bindParam(':type', $from);
      $stmt->bindParam(':icdt', $inc_date);
      $stmt->bindParam(':rpne', $rep_name);
      $stmt->bindParam(':rphm', $rep_hsnm);
      $stmt->bindParam(':rpst', $rep_strt);
      $stmt->bindParam(':rptn', $rep_town);
      $stmt->bindParam(':rppd', $rep_pscd);
      $stmt->bindParam(':rpho', $rep_hsno);
      $stmt->bindParam(':rpmo', $rep_mono);
      $stmt->bindParam(':locn', $location);
      $stmt->bindParam(':dscr', $descrip);
      $stmt->execute();
    }
  }
  catch(Exception $error){
    echo 'Error : '.$error->getMessage();
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <title>Incident Report</title>
  </head>

  <body>

    <h1 id="title"><?php echo $from ?> Report</h1>
    <h3 id="inc_date">Dated <?php echo date("d/m/Y", $screen_date) ?></h3>
    <h3><?php echo "Report Date : ".date("d/m/Y") ?><h3>
    </br>
    <div class="accident_only">
      <p id="inc_name"><strong>Injured person : </strong><?php echo $inc_name ?></p>
      <p id="inc_add"><strong>Address : </strong><?php echo $inc_hsnm." ".$inc_strt.", ".$inc_town.", ".$inc_pscd ?></p>
      <p class="accident_only" id="inc_num"><strong>Contact number(s) : </strong><?php echo $inc_mono."&nbsp;&nbsp;&nbsp;".$inc_hsno ?></p>
      </br>
    </div>
    <p id="rep_name"><strong>Reporter : </strong><?php echo $rep_name ?></p>
    <p id="rep_add"><strong>Address : </strong><?php echo $rep_hsnm." ".$rep_strt.", ".$rep_town.", ".$rep_pscd ?></p>
    <p id="rep_num"><strong>Contact Number(s) : </strong><?php echo $rep_mono."&nbsp;&nbsp;&nbsp;".$rep_hsno ?></p>
    </br>
    <h3><strong><?php echo $from ?> Details: </strong></h3>
    <div class="accident_only">
      <p><strong>Injury : </strong></p>
      <p><?php echo $injury ?></p>
      </br>
    </div>
    <div class="not_concern">
      <p><strong>Cause : </strong></p>
      <p><?php echo $cause ?></p>
      </br>
    </div>
    <p class="not_concern"><strong>Details : </strong></p>
    <p><?php echo $descrip ?></p>
    </br>
    <div class="accident_only">
      <h3><strong>Riddor Reportable : <?php echo $riddor ?></strong></h3>
      </br>
    </div>

    <div id="print">
      <button id="print_btn" onclick="printscreen()" type="button">Print</button>
    </div>

    <script type="text/javascript">
      function printscreen(){
        $("#print_btn").detach();
        window.print();
        location.href="../index.php";
      };
      function change_screen(){
        var page="<?php echo $from ?>";
        if(page=="Near Miss"){
          $(".accident_only").detach();
        }
        if(page=="Concern"){
          $(".accident_only").detach();
          $(".not_concern").detach();
        }
      }
      window.onload=change_screen;
    </script>

  </body>
</html>
