<?php
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
  header('Location: login.php');
  exit();
}
?>
<?php include('../inc/config.php'); ?>
<?php
if (!empty($_GET['delid'])) {
    $id = intval($_GET['delid']);
    mysqli_query($yhendus, "DELETE FROM reservations WHERE car_id=$id");
    $paring = "DELETE FROM cars WHERE id=$id";
    $valjund = mysqli_query($yhendus, $paring);
    if ($valjund) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($yhendus);
    }
}
?>