<?php

  try{

    $id=($_GET['id']);
    $id_from=substr($id, 0, 4);
    $id_id=substr($id, 5);

    include "connect.php";

    if($id_from=='admn'){
      $stmt=$pdo->prepare('UPDATE admin_login_data SET PASS="password" WHERE id=:id');
    }
    else if($id_from=='user'){
      $stmt=$pdo->prepare('UPDATE login_data SET PASS="password" WHERE id=:id');
    }
    $stmt->bindParam(':id', $id_id);
    $stmt->execute();

    $msg="Password Reset";
    echo '<script>location.href="../Admin_Site/users.php?msg='.$msg.'"</script>';

  }

  catch(Exception $error){
      echo 'Error : '.$error->getMessage();
  }

?>
