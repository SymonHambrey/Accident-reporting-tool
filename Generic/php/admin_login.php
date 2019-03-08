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
    $stmt=$pdo->prepare('SELECT * FROM admin_login_data WHERE ID = :id;');
    $stmt->bindParam(':id', $login_ID);
    $stmt->execute();
    $row=$stmt->fetch();
    $pwd=$row['PASS'];
    if($pwd=='password' && $login_PASS=='password'){
      $_SESSION['newpass']=$needed;
      $_SESSION['login']=$login_ID;
      $_SESSION['admin']="ADMIN";
      $result=true;
    }
    if(password_verify($login_PASS, $pwd)){
      $_SESSION['login']=$login_ID;
      $result=true;
    }
    if($result){
      echo "<script>location.replace('../Admin_Site/admin.php')</script>";
    }
    else{
      $msg="Access Denied. User ID or Password Incorrect";
      echo "<script>location.replace('../Admin_Site/admin_login.php?msg=$msg')</script>";
    }
  }

?>
