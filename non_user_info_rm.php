<?php
    session_start();

    $host = "localhost";
    $user = "kyj";
    $pw = "1234";
    $dbname = "proj";
    $mysqli = new mysqli($host, $user, $pw, $dbname);

    $phone1 = $_SESSION['phone1'];
    $phone2 = $_SESSION['phone2'];

    $sql = "delete from nonuser where phone1 = '$phone1' and phone2 = '$phone2'";

    $result = $mysqli->query($sql);

    if($result) {
        echo '<script>alert("예약이 취소되었습니다.");</script>';
        echo '<script>location.replace("login.php");</script>';
    } else {
        echo '<script>alert("실패");</script>';
    }

    mysqli_close();
?> 