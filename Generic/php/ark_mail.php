<!--  Copyright 2018 Symon Hambrey -->

<?php

  include "connect_report.php";

  $id=($_GET['user']);

  $stmt=$pdo->prepare('UPDATE mail SET archive="1" WHERE mail_ID=:id');
  $stmt->bindParam(':id', $id);
  $stmt->execute();

  echo "<script>location.replace('../Admin_Site/admin.php')</script>";

?>
