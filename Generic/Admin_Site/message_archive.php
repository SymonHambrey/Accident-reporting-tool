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
            <h1 class="text_large">Message Archive</h1>
          </div>
          <div class="col-md-2">
            <button id="back" type="button" class="remove_for_print top_right_button btn btn-primary">
              &lsaquo;&nbsp;Back
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="container messages">
      </br>
      <div class="row title_row title_row_all">
        <div class="col-md-4 title_row title_row_left lighter_blue">
          <p class="title_text align-middle">From</p>
        </div>
        <div class="col-md-7 title_row title_row_mid lighter_blue">
          <p class="title_text align-middle">Message</p>
        </div>
        <div class="col-md-1 title_row title_row_right lighter_blue">
          <p class="title_text align-middle">Delete</p>
        </div>
      </div>
      <div class="row title_row title_row_all">
        <?php
          while ($row=$stmt->fetch()){
            if(!is_null($row['archive'])){
              echo '<div class="col-md-4 title_row title_row_left">';
              echo "<div class='message_text' id='from_".$row['mail_ID']."'>".$row['email']."</div></div>";
              echo '<div class="col-md-7 title_row title_row_mid title_row_hover">';
              echo '<div class="message_text mail_content" id="'.$row['mail_ID'].'">'.substr($row['query'],0,80).'...</div>';
              echo '<div class="hidden_field" id="show_'.$row['mail_ID'].'">'.$row['query'].'</div></div>';
              echo '<div class="col-md-1 title_row title_row_right text-center"><p class="message_text">';
              ?>
                <form action="../php/delete_message.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $row['mail_ID']; ?>">
                  <input class="circle_button" type="submit" name="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                </form>
              <?php
              echo '</p></div>';
            };
          }
        ?>
      </div>
    </div>

    <script type="text/javascript" src="../js/admin.js"></script>

  </body>

</html>
