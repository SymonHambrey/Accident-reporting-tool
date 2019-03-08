<?php

/* Copyright 2018, Symon Hambrey, All rights reserved */

  session_start();

  if(isset($_SESSION['newpass'])){
    $_SESSION['page']="accidentform.php";
    echo '<script>location.replace("newpass.php")</script>';
  }
  else if(!isset($_SESSION['login']) || empty($_SESSION['login'])){
    echo '<script>location.replace("../index.php")</script>';
  }
  else if(!isset($_SESSION['login']) && !isset($_SESSION['newpass'])){
    echo '<script>location.replace("../index.php")</script>';
  }

?>

<!DOCTYPE html>

<html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Accident Report</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>

  <body>

    <div class="page-header">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <h1 class="text_large">Accident Reporting System</h1>
          </div>
          <div class="col-md-2">
            <button id="back" type="button" class="top_right_button btn btn-primary">
              &lsaquo;&nbsp;Back
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="container" id="acc_form">
      <form class="form-group" action="../php/print.php" method="post">
        <input type="hidden" name="from_page" value="Accident"/>
        <div class="row">
          <div class="col-md-6">
            <label for="acc_date">Date of Accident&nbsp;</label>
            <input type="date" name="acc_date" required/>
          </div>
        </div>
        <br>
        <h4 class="text-muted">Person Affected</h4>
        <div class="row">
          <div class="col-md-6 text-right">
            <label for="acc_name">Person involved in Accident&nbsp;</label>
            <input type="text" name="acc_name"/>
          </div>
          <!-- change this for company spec -->
<!--          <div class="col-md-5 text-right">
            <label for="acc_status">Association to the University&nbsp;</label>
            <select name="acc_status">
              <option value="staff">Staff</option>
              <option value="student">Student</option>
              <option value="contracter">Contractor</option>
              <option value="visitor">Visitor</option>
            </select>
          </div> -->
        </div>
        <div class="row">
          <div class="col-md-6 text-right">
            <label for="acc_houseno">House Number or Name&nbsp;</label>
            <input type="text" name="acc_houseno"/>
          </div>
          <div class="col-md-5 text-right">
            <label for="acc_street">Street Name&nbsp;</label>
            <input type="text" name="acc_street"/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 text-right">
            <label for="acc_town">Town&nbsp;</label>
            <input type="text" name="acc_town"/>
          </div>
          <div class="col-md-5 text-right">
            <label for="acc_postcode">Postcode&nbsp;</label>
            <input type="text" name="acc_postcode"/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 text-right">
            <label for="acc_homeno">Home Telephone&nbsp;<i class="material-icons" data-toggle="tooltip" title="This is optional">help</i>&nbsp;</label>
            <input type="number" name="acc_homeno" max="99999999999" min="0"/>
          </div>
          <div class="col-md-5 text-right">
            <label for="acc_mobile">Mobile Telephone&nbsp;<i class="material-icons" data-toggle="tooltip" title="This is optional">help</i>&nbsp;</label>
            <input type="number" name="acc_mobile" max="99999999999" min="0"/>
          </div>
        </div>
        <br>
        <h4 class="text-muted">Person Reporting</h4>
        <div class="row">
          <div class="col-md-6 text-right">
            <label for="rep_name">Person reporting the Accident&nbsp;</label>
            <input type="text" name="rep_name"/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 text-right">
            <label for="rep_houseno">House Number or Name&nbsp;</label>
            <input type="text" name="rep_houseno"/>
          </div>
          <div class="col-md-5 text-right">
            <label for="rep_street">Street Name&nbsp;</label>
            <input type="text" name="rep_street"/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 text-right">
            <label for="rep_town">Town&nbsp;</label>
            <input type="text" name="rep_town"/>
          </div>
          <div class="col-md-5 text-right">
            <label for="rep_postcode">Postcode&nbsp;</label>
            <input type="text" name="rep_postcode"/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 text-right">
            <label for="acc_homeno">Home Telephone&nbsp;<i class="material-icons" data-toggle="tooltip" title="This is optional">help</i>&nbsp;</label>
            <input type="number" name="rep_homeno" max="99999999999" min="0"/>
          </div>
          <div class="col-md-5 text-right">
            <label for="acc_mobile">Mobile Telephone&nbsp;<i class="material-icons" data-toggle="tooltip" title="This is optional">help</i>&nbsp;</label>
            <input type="number" name="rep_mobile" max="99999999999" min="0"/>
          </div>
        </div>
        <br>
        <h4 class="text-muted">Accident Details</h4>
        <div class="row">
  <!--        <div class="col-md-6 text-right">
            <label for="campus">Campus&nbsp;</label>
            <select name="campus">
              <option value="stjohns">St Johns</option>
              <option value="riverside">Riverside</option>
              <option value="city">City</option>
            </select>
          </div> -->
          <div class="col-md-5 text-right">
            <label for="location">Location&nbsp;</label>
            <input type="text" name="location"/>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-6" id="desc">
            <textarea type="textarea" name="inj_desc" rows="10" cols="80" placeholder="Description of any injury"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-6" id="desc">
            <textarea type="textarea" name="cau_desc" rows="10" cols="80" placeholder="Cause (if known)"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-6" id="desc">
            <textarea class="desc" type="textarea" name="inc_desc" rows="10" cols="80" placeholder="Description of Accident"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label for="riddor">Reportable to <strong>RIDDOR</strong></label>
            <input id="checkbox" type="checkbox" name="riddor"/>
          </div>
          <div class="col-md-4">
            <button class="blue-buttons btn btn-primary" type="submit">
              Submit
            </button>
          </div>
          <div class="col-md-4">
            <button class="blue-buttons btn btn-primary" type="button" id="cancel">
              Cancel
            </button>
          </div>
        </div>
      </form>
    </div>

    <div class="page-footer">
      <a href="https://hambreyhome.ddns.net/index.html" class="text_small">&copy; Symon Hambrey 2018</a>
    </div>

    <script src="../js/home.js"></script>

  </body>

</html>
