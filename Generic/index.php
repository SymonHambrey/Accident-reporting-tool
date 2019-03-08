<!--  Copyright 2018 Symon Hambrey -->

<?php
  try{
    $msg=($_GET['msg']);

    if(empty($msg)){
      $msg="";
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
    <title>Incident Reporting System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="css/modal.css"/>
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

    <div id="modal_login" class="modal fade login" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg">
        <div id="modal_login_content" class="modal-content">
          <span class="close_modal" title="Close" data-dismiss="modal">&times;</span><br>
          <form id="loginform" method="post" action="php/login.php">
            <div class="row">
              <div class="col-sm-6 text-right">
                <label for="user"><strong>Username&nbsp;</strong></label>
              </div>
              <div class="col-sm-6">
                <input type="text" placeholder="Enter Username" name="user" required/>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 text-right">
                <label for="pass"><strong>Password&nbsp;</strong></label>
              </div>
              <div class="col-sm-6">
                <input type="password" placeholder="Enter Password" name="pass" required/>
              </div>
              <br><br>
              <input type="hidden" name="page" value="acc" id="one"></input>
              <input type="hidden" name="page" value="con" id="two"></input>
              <input type="hidden" name="page" value="nea" id="three"></input>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6 text-center">
                    <button class="btn-primary btn_blue" type="button" data-dismiss="modal">Cancel</button>
                  </div>
                  <div class="col-md-6 text-center">
                    <button onclick="form_submit()" class="btn-primary btn_blue" type="submit">Submit</button>
                  </div>
                </div>
              </div>
            </form>
            <br><br>
          </div>
          <p class="col-md-12 text-center"> ** Please use the ID 'admin' and password 'testpass' for this demonstration **</p>
        </div>
      </div>
    </div>

    <div id="modal_contact" class="modal fade contact" tabindex="-1" role="dialog">
      <div id="1" class="modal-dialog modal-lg">
        <div id="modal_contact_content" class="modal-content"></br>
          <span id="2" class="close_modal" title="Close" data-dismiss="modal">&times;</span>
          <form method="post" action="php/mail.php">
            <div class="row">
              <div class="col-sm-6 text-right">
                <label for="new_user"><strong>Enter email address&nbsp;</strong></label>
              </div>
              <div class="col-sm-6">
                <input type="text" placeholder="joebloggs@gmail.com" name="email" required/>
              </div>
            </div>
            <div class="row">
              <div class="col-md-1"></div><!-- left space -->
              <div class="col-md-6">
                <label for="query"><strong>Enter query&nbsp;</strong></label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-1"></div><!-- left space -->
              <div class="col-md-10">
                <textarea type="textarea" class="querybox" placeholder="Type your query...." name="query"></textarea>
              </div>
              <div class="col-md-1"></div><!-- right space -->
              <input type="hidden" value="../index.php" name="previous"></input>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6 text-center">
                  <button class="btn-primary btn_blue" type="button" data-dismiss="modal">Cancel</button>
                </div>
                <div class="col-md-6 text-center">
                  <button id="email_submit" class="btn-primary btn_blue" type="submit">Submit</button>
                </div>
              </div>
            </div>
          </form>
          <div class="col-md-6 text-right">
            <p id="confirmation"></p>
          </div>
          <br>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <ul class="nav">
            <li id="change" class="dropdown"><p class="text_small navbar">Change in the law</p>
              <div class="dropdown-content text_small">
                <p class="text_box"><strong>Please note that the law changed on 6 April 2012.</strong></br></br>
                  If a worker sustains an occupational injury resulting from an accident,</br>
                  their injury should be reported if they are incapacitated for more than seven days.</br>
                  There is no longer a requirement to report occupational injuries that result in more than three days of incapacitation,</br>
                  but you must still keep a record of such injuries.</p>
              </div>
            </li>
            <li id="help" class="dropdown"><p class="text_small navbar">Help</p>
              <div class="dropdown-content text_small">
                <a href="help/difference.html">What is the difference between recordable and reportable?</a>
                <a href="help/reportable.html">What constitutes a reportable accident?</a>
                <a href="help/nearmiss.html">What constitutes a near miss?</a>
                <a href="help/personalinformation.html">How is my personal information used?</a>
                <a href="help/furtherinformation.html">Information for employers and employees</a>
              </div>
            </li>
            <li id="admin"><a class="text_small navbar" href="Admin_Site/admin_login.php">Administrator page</a></li>
          </ul>
        </div>
        <div class="col-md-2"><?php echo $msg ?></div>
      </div>
    </div>

    <div class="page-body container">
      </div>
      <div class="row main_page">
        <div class="col-md-2"></div>
        <div id="acc_butt" class="col-md-2 main_box" data-toggle="modal" data-target=".login">
          <p class="text-center text">Record Accident</p>
          <img class "box_image" src="images/accident.png"/>
        </div>
        <div class="col-md-1"></div>
        <div id="nea_butt" class="col-md-2 main_box" data-toggle="modal" data-target=".login">
          <p class="text-center text">Record Near Miss</p>
          <img class "box_image" src="images/near.png"/>
        </div>
        <div class="col-md-1"></div>
        <div id="con_butt" class="col-md-2 main_box" data-toggle="modal" data-target=".login">
          <p class="text-center text">Record Concern</p>
          <img class "box_image" src="images/concern.png"/>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>

    <div class="page-footer">
      <a href="https://hambreyhome.ddns.net/index.html" class="text_small">&copy; Symon Hambrey 2018</a>
    </div>

    <script src="js/home.js"></script>

  </body>
</html>
