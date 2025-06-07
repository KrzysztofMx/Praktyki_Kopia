<?php

$id = $_POST['delid'];
$tmpid = $id;

$h = "localhost";
$u = "root";
$p = "";
$db = "praktyki";
$conn = new mysqli($h, $u, $p, $db);

$sql1 = "SELECT level FROM `file` WHERE `id_File` = '$id'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$lvl = $row1['level'];

$del = "DELETE FROM file WHERE `file`.`id_File` = $id AND `file`.`level` = '$lvl'";

$conn->query($del);

echo $del . "<br>";
while (True) {
    $id++;
    $sql2 = "SELECT level FROM `file` WHERE `id_File` = '$id'";
    echo $sql2 . "<br>";
    $result2 = $conn->query($sql2);
    $row = $result2->fetch_assoc();

    if ($row['level'] == !NULL) {
        echo $row['level'] . "<br>";
        echo $id . "<br>";
        if ($row['level'] <= $lvl) {
            break;
        }
        $sqldel = "DELETE FROM file WHERE `file`.`id_File` = $id AND `file`.`level` = '" . $row['level'] . "'";
    } else {
        echo "nic";
        break;
    }
    $conn->query($sqldel);
}

// mysqli_query($conn, $sql);


echo $id . "<br>";
echo $lvl . "<br>";

header("Location: system.php");