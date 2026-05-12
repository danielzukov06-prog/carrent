<?php
session_start();

session_destroy();
header('Location: /project2/admin/login.php');
exit;
?>