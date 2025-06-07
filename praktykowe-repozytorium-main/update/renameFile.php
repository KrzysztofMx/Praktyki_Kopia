<?php

$id = $_POST['renid'];
$renname = $_POST['renname'];


$h = "localhost";
$u = "root";
$p = "";
$db = "praktyki";
$conn = new mysqli($h, $u, $p, $db);

$ren = "UPDATE `file` SET `name_File` = '$renname ' WHERE `file`.`id_File` = $id";
echo $ren;
$conn->query($ren);
header("Location: system.php");