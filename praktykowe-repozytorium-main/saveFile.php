<?php
session_start();
$id = $_POST['saveFileId'];
$val = $_POST['saveFileVal'];

$h = "localhost";
$u = "root";
$p = "";
$db = "praktyki";
$conn = new mysqli($h, $u, $p, $db);

$query = "UPDATE file SET content='$val' WHERE id_File = '$id'";
$res = mysqli_query($conn, $query);

$_SESSION['lastId'] = $id;

header("Location: system.php");
?>
