<?php

/* Copyright 2018, Symon Hambrey, All rights reserved */

  session_start();

  $needed="1";
  $result=false;

  require "connect.php";

  $login_ID=($_POST['user']);
  $login_PASS=($_POST['pass']);
  $passthrough=($_POST['page']);

  if(!empty($login_ID)){
    $stmt=$pdo->prepare('SELECT * FROM login_data WHERE ID = :id;');
    $stmt->bindParam(':id', $login_ID);
    $stmt->execute();
    $row=$stmt->fetch();
    $pwd=$row['PASS'];
    if($pwd=='password' && $login_PASS=='password'){
      $_SESSION['newpass']=$needed;
      $_SESSION['login']=$login_ID;
      $result=true;
    }
    if(password_verify($login_PASS, $pwd)){
      $_SESSION['login']=$login_ID;
      $result=true;
    }
    if($result){
      if($passthrough=='con'){
        echo "<script>location.replace('../reports/concernform.php')</script>";
        }
      elseif($passthrough=='nea'){
        echo "<script>location.replace('../reports/nearmissform.php')</script>";
      }
      else{
        echo "<script>location.replace('../reports/accidentform.php?')</script>";
      }
    }
    else{
      $msg="Access Denied \\nUser ID or Password Incorrect";
      echo "<script>alert(\"$msg\")</script>";
      echo "<script>location.replace('../index.php')</script>";
    }
  }
  else{
    echo "<script>alert('User ID Required')</script>";
    echo '<script>location.replace("../index.php")</script>';
  }

?>
