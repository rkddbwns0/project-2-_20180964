<?php
    session_start();
    $host = 'localhost';
    $user = 'kyj';
    $pw = '1234';
    $dbname = 'proj';
    $con = new mysqli($host, $user, $pw, $dbname);

    $id = $_POST['id'];
    $pw = $_POST['pw'];

    $query = "select * from user where id = '$id' and pw = '$pw'";

    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

    if($row != null) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['pw'] = $row['pw'];
        echo "<script>location.replace('../user_main.php');</script>";
    } 
    if($row == null){
        echo "<script> alert('아이디 혹은 비밀번호가 잘못 입력되었습니다.'); </script>";
        echo "<script>history.back();</script>";
        exit;
    }
?>