<?php
    session_start();

    $host = "localhost";
    $user = "kyj";
    $pw = "1234";
    $dbname = "proj";
    $mysqli = new mysqli($host, $user, $pw, $dbname);

    $name = $_POST['name'];
    $jumin1 = $_POST['jumin1'];
    $jumin2 = $_POST['jumin2'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];

    //echo "name: $name, jumin1: $jumin1, jumin2: $jumin2, phone1: $phone1, phone2: $phone2";

    $sql = "select * from nonuser where name = '$name' and jumin1 = '$jumin1'and jumin2 = '$jumin2'and phone1 = '$phone1'and phone2 = '$phone2'";
    $result = $mysqli -> query($sql);

    if($result->num_rows > 0) {
        $row = $result -> fetch_assoc();

        $_SESSION['phone1'] = $row['phone1'];
        $_SESSION['phone2'] = $row['phone2'];

        echo "<script>location.replace('non_user_info.php');</script>";
    } else {
        echo "<script>alert('예약 정보가 없습니다. 다시 확인해주세요.');</script>";
        echo "<script>history.back();</script>";
    }

    mysqli_close();
?>