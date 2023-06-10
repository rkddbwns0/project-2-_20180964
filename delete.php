<?php
    session_start();

    $id = $_SESSION['id'];

    $host = 'localhost';
    $user = 'kyj';
    $pw = '1234';
    $dbname = 'proj';
    $mysqli = new mysqli($host, $user, $pw, $dbname);

    $sql = "delete from reserve where id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $id);

    if($stmt->execute()) {
        echo "<script>alert('예약이 취소되었습니다.')</script>";
        echo "<script>location.replace('user_main.php');</script>";
    }

    mysqli_close($mysqli);
?>