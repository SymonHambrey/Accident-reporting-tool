<?php

/* Copyright 2018, Symon Hambrey, All rights reserved */

session_start();

if(isset($_POST['submit'])){

  include '../php/connect.php';

  $newpass=($_POST['newpass']);
  $conpass=($_POST['confirm']);
  $error="";
  $admin="";
  $id=($_SESSION['login']);
  $page=($_SESSION['page']);
  $admin=($_SESSION['admin']);

  echo "<script>console.log('$admin')";
  echo "<script>console.log('$id')";


  if(empty($newpass) && empty($conpass)){
    $error="Cannot be blank $id $page";
  }
  elseif($newpass!=$conpass){
    $error="Passwords do not match";
  }
  elseif(strlen($newpass)<8){
    $error="Password too short";
  }
  else{
    $hash=password_hash($newpass, PASSWORD_DEFAULT);
    if($admin=='ADMIN'){
      $stmt=$pdo->prepare("UPDATE admin_login_data SET PASS=:pwd WHERE ID=:id;");
    }
    else{
      $stmt=$pdo->prepare("UPDATE login_data SET PASS=:pwd WHERE ID=:id;");
    }
    $stmt->bindParam(':pwd', $hash);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    unset($_SESSION['newpass']);
    header("location: $page");
  }

}

?>
