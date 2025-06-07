<?php
session_start();
$name = $_POST[''];
$userid = $_SESSION['u_id'];

$h = "localhost";
$u = "root";
$p = "";
$db = "praktyki";
$conn = new mysqli($h, $u, $p, $db);

$ren = "INSERT INTO `project` (`id_Project`, `name_Project`, `user_Creator`) VALUES (NULL, '$name', '$userid');";
echo $ren;
// $conn->query($ren);
// header("Location: system.php");