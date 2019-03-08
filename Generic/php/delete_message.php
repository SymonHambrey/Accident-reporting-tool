<?php

/* Copyright 2018, Symon Hambrey, All rights reserved */

  try{

    $id=($_POST['id']);

    include "connect_report.php";

    $stmt=$pdo->prepare('DELETE FROM mail WHERE mail_ID=:id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    echo '<script>location.replace("../Admin_Site/message_archive.php")</script>';
  }

  catch(Exception $error){
      echo 'Error : '.$error->getMessage();
  }


?>
