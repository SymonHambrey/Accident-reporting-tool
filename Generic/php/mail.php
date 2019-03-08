<?php

/* Copyright 2018, Symon Hambrey, All rights reserved */

  require "connect_report.php";

  $email=($_POST['email']);
  $query=($_POST['query']);
  $reply="Message Sent";

  try{
    $stmt=$pdo->prepare('INSERT INTO mail(email, query) VALUES(:email, :query)');
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':query', $query);
    $stmt->execute();
    echo "<script>location.replace('../index.php?msg=$reply')</script>";
  }
  catch(Exception $error){
    echo 'Error : '.$error->getMessage();
  }

?>
