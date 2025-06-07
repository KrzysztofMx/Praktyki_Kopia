<?php
session_start();

$h = "localhost";
$u = "root";
$p = "";
$b = "praktyki";

$conn = mysqli_connect($h, $u, $p, $b);

$lvl = $_POST['lvl'];
$id = $_POST['parentId'];
$name = $_POST['filename'];
$projectId = $_POST['projectId'];
$userId = $_SESSION['u_id'];

if($id == -1){
    $sql = "INSERT INTO `file` (`id_File`, `name_File`, `id_Project`, `content`, `id_User`, `id_Parent`, `level`) VALUES (NULL, '$name', $projectId, ' ', $userId, NULL, $lvl)";
    mysqli_query($conn,$sql);
}
else{
    $sql = "INSERT INTO `file` (`id_File`, `name_File`, `id_Project`, `content`, `id_User`, `id_Parent`, `level`) VALUES (NULL, '$name', $projectId, ' ', $userId, $id, $lvl)";
    mysqli_query($conn,$sql);
}

header("Location: system.php");