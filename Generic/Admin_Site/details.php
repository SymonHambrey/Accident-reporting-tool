<!--  Copyright 2018 Symon Hambrey -->

<?php

  try{
    session_start();

    if(!isset($_SESSION['login'])){
      echo "<script>location.replace('admin_login.php')</script>";
    }

    include "../php/connect_report.php";

    $passthrough=($_GET['user']);
    $from=substr($passthrough, 0, 3);
    $id=substr($passthrough, 4);

    if($from=='acc'){
      $title="Accident";
      $stmt=$pdo->prepare('SELECT * FROM accReport WHERE report_ID=:id');
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      $row=$stmt->fetch();
    }

    else if($from=="nea"){
      $title="Near Miss";
      $stmt=$pdo->prepare('SELECT * FROM nearMiss WHERE report_ID=:id');
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      $row=$stmt->fetch();
    }

    else{
      $title="Concern";
      $stmt=$pdo->prepare('SELECT * FROM concern WHERE report_ID=:id');
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      $row=$stmt->fetch();
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
    <title>IRS Administration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans">
    <link rel="stylesheet" href="../css/main.css"/>
    <link rel="stylesheet" href="../css/modal.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  </head>

  <body>

    <div class="page-header">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h1 class="text_large"><?php echo $title ?> Details</h1>
          </div>
          <div class="col-md-2">
            <button id="back" type="button" class="remove_for_print top_right_button btn btn-primary">
              &lsaquo;&nbsp;Back
            </button>
          </div>
          <div class="col-md-2">
            <button id="print" type="button" class="remove_for_print top_right_button btn btn-primary" onclick="printscreen()">
              Print
            </button>
          </div>
        </div>
      </div>
    </div>

    </br>

    <div class="row">
      <div class="col-md-6">
        <h3>Incident Date <?php echo date("d/m/Y", strtotime($row['inc_date'])) ?></h3>
      </div>
    </div>

    </br>

    <div class="accident">
      <div class="row">
        <div class="col-md-12">
          <h4>Injured Party</h4>
        </div>
      </div>
      <div class="container">
        <div class="row title_row title_row_all">
          <div class="col-md-4 title_row title_row_left lighter_blue">
            <p class="title_text align-middle">Name</p>
          </div>
          <div class="col-md-4 title_row title_row_mid lighter_blue">
            <p class="title_text align-middle">Address</p>
          </div>
          <div class="col-md-4 title_row title_row_right lighter_blue">
            <p class="title_text align-middle">Contact Numbers</p>
          </div>
        </div>
        <div class="row title_row title_row_all">
          <div class="col-md-4 title_row title_row_left">
            <p class="hidden" id="archive"><?php echo $row['archive'] ?></p>
            <p class="title_text align-middle" id="name"><?php echo $row['inc_name'] ?></p>
          </div>
          <div class="col-md-4 title_row title_row_mid">
            <p class="title_text align-middle"><?php echo $row['inc_hsnm']." ".$row['inc_strt'].", ".$row['inc_town']."</br> ".$row['inc_pscd'] ?></p>
          </div>
          <div class="col-md-4 title_row title_row_right">
            <p class="title_text align-middle"><?php echo $row['inc_hsno']."</br> ".$row['inc_mono']?></p>
          </div>
        </div>
      </div>
    </div>

    </br>

    <div class="row">
      <div class="col-md-12">
        <h4>Reported By</h4>
      </div>
    </div>
    <div class="container">
      <div class="row title_row title_row_all">
        <div class="col-md-4 title_row title_row_left lighter_blue">
          <p class="title_text align-middle">Name</p>
        </div>
        <div class="col-md-4 title_row title_row_mid lighter_blue">
          <p class="title_text align-middle">Address</p>
        </div>
        <div class="col-md-4 title_row title_row_right lighter_blue">
          <p class="title_text align-middle">Contact Numbers</p>
        </div>
      </div>
      <div class="row title_row title_row_all">
        <div class="col-md-4 title_row title_row_left">
          <p class="title_text align-middle"><?php echo $row['rep_name'] ?></p>
        </div>
        <div class="col-md-4 title_row title_row_mid">
          <p class="title_text align-middle"><?php echo $row['rep_hsmn']." ".$row['rep_strt'].", ".$row['rep_town']."</br> ".$row['rep_pscd'] ?></p>
        </div>
        <div class="col-md-4 title_row title_row_right">
          <p class="title_text align-middle"><?php echo $row['rep_hsno']."</br> ".$row['rep_mono']?></p>
        </div>
      </div>
    </div>

    </br>

    <div class="accident">
      <div class="row">
        <div class="col-md-12">
          <h4>Incident Details</h4>
        </div>
      </div>
      <div class="container">
        <div class="row title_row title_row_all">
          <div class="col-md-12 title_row title_row_full lighter_blue">
            <p class="title_text">Injury</p>
          </div>
        </div>
        <div class="row title_row title_row_all">
          <div class="col-md-12 title_row title_row_full lighter_blue" id="rid_background">
            <p class="title_text text-centre">RIDDOR Reportable :&nbsp;<span id="rid_text"><?php echo $row['riddor'] ?></span></p>
          </div>
        </div>
        <div class="row title_row title_row_all">
          <div class="col-md-12 title_row title_row_full">
            <p class="title_text align-middle"><?php echo $row['injury'] ?></p>
          </div>
        </div>
      </div>
    </div>


    </br>

    <div class="container" id="near_miss">
      <div class="row title_row title_row_all">
        <div class="col-md-12 title_row title_row_full lighter_blue">
          <p class="title_text align-middle">Cause</p>
        </div>
      </div>
      <div class="row title_row title_row_all">
        <div class="col-md-12 title_row title_row_full">
          <p class="title_text align-middle" id="cause"><?php echo $row['cause'] ?></p>
        </div>
      </div>
    </div>

    </br>

    <div class="container">
      <div class="row title_row title_row_all">
        <div class="col-md-12 title_row title_row_full lighter_blue">
          <p class="title_text align-middle">Description</p>
        </div>
      </div>
      <div class="row title_row title_row_all">
        <div class="col-md-12 title_row title_row_full">
          <p class="title_text align-middle"><?php echo $row['description'] ?></p>
        </div>
      </div>
    </div>

    </br>

    <div class="row notes_text">
      <div class="col-md-12">
        <h4>Investigation</h4>
      </div>
    </div>
    <div class="container notes_text">
      <div class="row title_row title_row_all">
        <div class="col-md-12 title_row title_row_full lighter_blue">
          <p class="title_text">Past Notes</p>
        </div>
      </div>
      <div class="row title_row title_row_all">
        <div class="col-md-12 title_row title_row_full">
          <p id="notes_text" class="title_text align-middle"><?php echo $row['follow_up'] ?></p>
        </div>
      </div>
    </div>

    </br>

    <div class="container remove_for_print remove_if_archive">
      <div class="row">
        <div class="col-md-2 content">
          <button id="investigate" class="btn btn-primary">Add To Investigation Notes</button>
        </div>
      </div>
    </div>

    </br>

    <div class="investigation hidden">

      <div class="container">
        <div class="row title_row title_row_all">
          <div class="col-md-12 title_row title_row_full lighter_blue">
            <p class="title_text">Investigation Notes</p>
          </div>
        </div>
        <form action="../php/investigate.php" method="post">
          <div class="row title_row title_row_all">
            <div class="col-md-12 title_row title_row_full">
              <input type="hidden" name="notes_id" value="<?php echo $row['report_ID'] ?>"/>
              <input type="hidden" name="notes_type" value="<?php echo $row['type'] ?>"/>
              <textarea class="desc" type="textarea" name="invest" rows="10" cols="100"></textarea>
            </div>
          </div>
          </br>
          <div class="row remove_for_print">
            <div class="col-md-2">
              <button name="add" class="btn btn-primary">Add To Notes</button>
            </div>
            <div class="col-md-2">
              <button name="conclude" class="btn btn-primary">Conclude Investigation</button>
            </div>
          </div>
        </form>
      </div>

    </div>

<!--    <script type="text/javascript" src="../js/admin.js"></script> -->
    <script type="text/javascript" src="../js/details.js"></script>

  </body>

</html>
