<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$db_server = 'localhost';
$db_andmebaas = 'autorent2';
$db_kasutaja = 'root';
$db_salasona = '';
$yhendus = mysqli_connect($db_server, $db_kasutaja, $db_salasona, $db_andmebaas);
if (!$yhendus) {
    die('Ei saa ühendust andmebaasiga');
}
?>