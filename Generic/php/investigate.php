<!--  Copyright 2018 Symon Hambrey -->

<?php

  session_start();

  $alert=($_SESSION['login']);

  try{

    include "connect_report.php";

    $invest=($_POST['invest']);
    $id=($_POST['notes_id']);
    $type=($_POST['notes_type']);
    $ark=1;

    if(isset($_POST['add'])){

      if($type=="Accident"){
        $stmt=$pdo->prepare('SELECT follow_up FROM accReport WHERE report_ID=:id');
      }
      else if($type=="Near Miss"){
        $stmt=$pdo->prepare('SELECT follow_up FROM nearMiss WHERE report_ID=:id');
      }
      else{
        $stmt=$pdo->prepare('SELECT follow_up FROM concern WHERE report_ID=:id');
      }
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      $row=$stmt->fetch();

      $invest="Report by ".$alert.", ".date("d/m/Y G:i:s")." : ".$invest."</br>".$row['follow_up'];

      if($type=="Accident"){
        $stmt=$pdo->prepare('UPDATE accReport SET follow_up=:invest WHERE report_ID=:id');
      }
      else if($type=="Near Miss"){
        $stmt=$pdo->prepare('UPDATE nearMiss SET follow_up=:invest WHERE report_ID=:id');
      }
      else{
        $stmt=$pdo->prepare('UPDATE concern SET follow_up=:invest WHERE report_ID=:id');
      }
      $stmt->bindParam(':invest', $invest);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      echo "<script>location.href='../Admin_Site/admin.php';</script>";

    }

    if(isset($_POST['conclude'])){
      if($type=="Accident"){
        $stmt=$pdo->prepare('UPDATE accReport SET archive=:ark WHERE report_ID=:id');
      }
      else if($type=="Near Miss"){
        $stmt=$pdo->prepare('UPDATE nearMiss SET archive=:ark WHERE report_ID=:id');
      }
      else{
        $stmt=$pdo->prepare('UPDATE concern SET archive=:ark WHERE report_ID=:id');
      }
      $stmt->bindParam(':ark', $ark);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      echo "<script>location.href='../Admin_Site/admin.php';</script>";

    }

  }
  catch(Exception $error){
    echo 'Error : '.$error->getMessage();
  }

?>
