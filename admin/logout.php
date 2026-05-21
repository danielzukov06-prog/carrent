<?php
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
  header('Location: login.php');
  exit();
  }
session_unset();
session_destroy();
header('Location: /carrent/admin/login.php');
exit;
?>