<?php
    session_start();

    $host = "localhost";
    $user = "kyj";
    $pw = "1234";
    $dbname = "proj";
    $mysqli = new mysqli($host, $user, $pw, $dbname);

    $id = $_SESSION['id'];

    $sql = "select name from user where id = '$id'";
    $result = $mysqli -> query($sql);
    $row = $result->fetch_assoc();

    $name = $row['name'];
    $hospital = $_POST['hospital'];
    $medical = $_POST['medical'];
    $symptom = $_POST['symptom'];
    $date = $_POST['date'];
    $formatted_date = date('Y-m-d', strtotime($date));
    $time = $_POST['time'];  

    $sql = "insert into reserve (id, name, hospital ,medical,symptom, date, time) values (?, ?, ?, ?, ?, ?, ?)";
 
    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param("sssssss", $id, $name, $hospital ,$medical, $symptom, $formatted_date, $time);

    if($stmt->execute()) {
        echo "<script> alert('예약되었습니다.'); </script>";
        echo "<script>location.replace('../user_main.php');</script>";
    } else {
        echo "<script> alert('정보를 다시 입력해주세요.'); </script>";
    }

    mysqli_close($mysqli);
?>
