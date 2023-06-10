<?php
    $host = "localhost";
    $user = "kyj";
    $pw = "1234";
    $dbname = "proj";
    $mysqli = new mysqli($host, $user, $pw, $dbname);

    $hospital = $_POST['hospital'];
    $name = $_POST["name"];
    $jumin1 = $_POST["jumin1"];
    $jumin2 = $_POST["jumin2"];
    $phone1 = $_POST["phone1"];
    $phone2 = $_POST["phone2"];
    $medical = $_POST["medical"];
    $symptom = $_POST['symptom'];
    $date = $_POST['date']; 
    $formatted_date = date('Y-m-d', strtotime($date));
    $time = $_POST['time'];

    $query = "select * from nonuser where phone1 = '$phone1' and phone2 = '$phone2'";

    $result = $mysqli->query($query);

    if($result -> num_rows > 0) {
        echo "<script>alert('이미 예약된 회원입니다.');</script>";
        echo "<script>history.back();</script>";
    } else {
        $sql = "insert into nonuser (hospital, name, jumin1, jumin2, phone1, phone2, medical, symptom, date, time) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $mysqli->prepare($sql);
        $stmt -> bind_param("ssssssssss",  $hospital, $name, $jumin1, $jumin2, $phone1, $phone2, $medical, $symptom, $formatted_date, $time);
        $stmt->execute();
        echo "<script>alert('예약이 완료되었습니다!');</script>";
        echo "<script>location.replace('login.php');</script>";
    }

    mysqli_close($mysqli);
?>

    