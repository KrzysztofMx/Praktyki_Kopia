<!DOCTYPE html>

<?php
ob_start();
session_start();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='style.css' rel='stylesheet'>
    <title>Logowanie</title>
</head>

<body class="body-log">
    <h1>Login</h1>
    <form action="#" method="post">
        <label for="">
            <p>Login</p>
            <?php
            if (isset($_SESSION['username'])) {
                echo "<input type='text' name='login' placeholder='" . $_SESSION['username'] . "'>";
            } else {
                echo "<input type='text' name='login'>";
            }

            ?>
        </label>
        <label for="">
            <p>Password</p>
            <input type="password" class="" name="pass">
        </label>
        <button>Login</button>
        <?php
        $h = "localhost";
        $u = "root";
        $p = "";
        $b = "praktyki";

        $conn = mysqli_connect($h, $u, $p, $b);
        if (mysqli_errno($conn) == 0) {
            if (isset($_POST['login']) && isset($_POST['pass'])) {
                echo "<div class='wynik'>";
                $log = $_POST['login'];
                $pass = $_POST['pass'];
                $pass = md5($pass);
                //  echo $pass;
                $sql = "SELECT * FROM `user` WHERE user.login = '$log'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['password'] == $pass) {
                        $u_id = $row['id_user'];
                        $_SESSION['valid'] = true;
                        $_SESSION['timeout'] = time();
                        $_SESSION['username'] = $log;
                        $_SESSION['u_id'] = $u_id;
                        echo "<p>Login!</p></div>";
                        //after chceck correct password go to another site index.php
                        header("Location: ./system.php");
                    } else {
                        echo "<p>Check Login or Password!</p></div>";
                    }
                } else {
                    echo "<p>Check Login or Password!</p></div>";
                }
            }
        }
        ?>
    </form>
    <a href="system.php">Powrót<img src="arrow-right-r.svg" alt="arrow"></a>
</body>

</html>