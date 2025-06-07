<?php

$id = $_POST['delid'];
$tmpid = $id;

$h = "localhost";
$u = "root";
$p = "";
$db = "praktyki";
$conn = new mysqli($h, $u, $p, $db);

$sql1 = "SELECT level, id_Project FROM `file` WHERE `id_File` = '$id'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$lvl = $row1['level'];
$Proj = $row1['id_Project'];

$del = "DELETE FROM file WHERE `file`.`id_File` = $id AND `file`.`level` = '$lvl' AND id_Project = '$Proj'";
$conn->query($del);
echo "<br> DEl $id <br>";

while (True) {
    $sqlmax = "SELECT max(id_File) FROM `file` WHERE id_Project = $Proj";
    $resultmax = $conn->query($sqlmax);
    $rowamx = $resultmax->fetch_assoc();
    //if max id  = id then break
    if ($rowamx['max(id_File)'] == $tmpid) {
        echo "pierwszy ostatni <br>";
        break;
    }
    $id++;
    $sqlLvl = "SELECT level FROM `file` WHERE `id_File` = '$id' AND id_Project =' $Proj '";
    $resultLvl = $conn->query($sqlLvl);
    $rowLvl = $resultLvl->fetch_assoc();
    //if resoult is empty
    if ($resultLvl->num_rows == 0) {
        continue;
    } else {
        if ($rowLvl['level'] <= $lvl) {
            echo "Koniec bo napotkałem mniejszy lub równy level";
            break;
        } else {
            $sqldel = "DELETE FROM file WHERE `file`.`id_File` = $id AND `file`.`level` = '" . $rowLvl['level'] . "' AND id_Project =' $Proj '";
            $conn->query($sqldel);
            if ($rowamx['max(id_File)'] == $id) {
                echo "Koniec bo napotkałem max";
                break;
            }
        }
    }
}

header("Location: system.php");