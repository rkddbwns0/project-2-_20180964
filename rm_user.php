<?php
    session_start();

    $host = "localhost";
    $user = "kyj";
    $pw = "1234";
    $dbname = "proj";
    $mysqli = new mysqli($host, $user, $pw, $dbname);

    $id = $_SESSION['id'];
    
    $sql2 = "delete from reserve where id = '$id'";
    $sql = "delete from user where id = '$id'";


    $result2 = $mysqli->query($sql2);
    $result = $mysqli->query($sql);

    if($result && $result2) {
        echo "<script>alert('회원 탈퇴가 완료되었습니다.');</script>";
        echo "<script>location.replace('login.php');</script>";
    } else {
        echo "Error:" .$mysqli->error;
    }

    mysqli_close();
?>