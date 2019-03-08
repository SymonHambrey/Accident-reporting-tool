<!--  Copyright 2018 Symon Hambrey -->

<?php

  session_start();

  require 'connect.php';

  $id=($_POST['ID']);
  $f_name=($_POST['first_name']);
  $l_name=($_POST['last_name']);
  $ad_us=($_POST['ad_us']);
  $pass="password";

  try{

    $stmt=$pdo->prepare('SELECT ID FROM admin_login_data WHERE ID = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row=$stmt->fetch();

    if(empty($row)){
      $stmt=$pdo->prepare('SELECT ID FROM login_data WHERE ID=:id');
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      $row=$stmt->fetch();

      if(empty($row)){
        if($ad_us=="admin"){
          $stmt=$pdo->prepare('INSERT INTO admin_login_data (ID, PASS, first_name, last_name) VALUES(:id, :pass, :fName, :lName)');
          $stmt->bindParam(':id', $id);
          $stmt->bindParam(':pass', $pass);
          $stmt->bindParam(':fName', $f_name);
          $stmt->bindParam(':lName', $l_name);
          $stmt->execute();
        }
        $stmt=$pdo->prepare('INSERT INTO login_data (ID, PASS, first_name, last_name) VALUES(:id, :pass, :fName, :lName)');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':fName', $f_name);
        $stmt->bindParam(':lName', $l_name);
        $stmt->execute();
        $msg="User added sucessfuly";
        echo "<script>location.replace('../Admin_Site/users.php?msg=$msg')</script>";
      }
    }
    $msg="Username already in use";
    echo "<script>location.replace('../Admin_Site/users.php?msg=$msg')</script>";
  }
  catch(Exception $error){
    echo 'Error : '.$error->getMessage();
  }


?>
