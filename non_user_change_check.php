<?php
    session_start();

    $host = "localhost";
    $user = "kyj";
    $pw = "1234";
    $dbname = "proj";
    $mysqli = new mysqli($host, $user, $pw, $dbname);

    $phone1 = $_SESSION['phone1'];
    $phone2 = $_SESSION['phone2'];
    $medical = $_POST['medical'];
    $symptom = $_POST['symptom'];
    $date = $_POST['date'];
    $formatted_date = date('Y-m-d', strtotime($date));
    $time = $_POST['time'];

    $sql = "update nonuser set medical = ?, symptom = ?, date = ?, time = ? where phone1 = ? and phone2 = ?";

    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param("ssssss", $medical, $symptom, $formatted_date, $time, $phone1, $phone2);

    if($stmt->execute()) {
        echo "<script>location.replace('login.php')</script>";
    }
    
    mysqli_close();
?>