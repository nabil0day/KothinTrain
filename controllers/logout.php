<?php

  session_start();
  session_unset();
  setcookie('username', '', time() - 3600);
  session_destroy();
  header('location: ../views/publicHome.php');

?>