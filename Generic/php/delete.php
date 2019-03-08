/* Copyright 2018, Symon Hambrey, All rights reserved */

<?php

  session_start();

  try{

    $current=($_SESSION['login']);
    $id=($_GET['id']);
    $id_from=substr($id, 0, 4);
    $id_id=substr($id, 5);
    include "connect.php";

    if($current!=$id_id){
      if($id_from=='admn'){
        $stmt=$pdo->prepare('DELETE FROM admin_login_data WHERE id=:id');
      }
      else if($id_from=='user'){
        $stmt=$pdo->prepare('DELETE FROM login_data WHERE id=:id');
      }
      $stmt->bindParam(':id', $id_id);
      $stmt->execute();

      $msg="User deleted successfully";
      echo "<script>location.replace('../Admin_Site/users.php?msg=$msg')</script>";

    }
    else{
      $msg="Cannot delete current user";
      echo "<script>location.replace('../Admin_Site/users.php?msg=$msg')</script>";
    }

  }

  catch(Exception $error){
      echo 'Error : '.$error->getMessage();
  }

?>
