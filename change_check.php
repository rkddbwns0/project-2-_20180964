<?php
    session_start();

    $host = "localhost";
    $user = "kyj";
    $pw = "1234";
    $dbname = "proj";
    $mysqli = new mysqli($host, $user, $pw, $dbname);

    $id = $_SESSION['id'];
    $medical = $_POST['medical'];
    $symptom = $_POST['symptom'];
    $date = $_POST['date'];
    $formatted_date = date('Y-m-d', strtotime($date));
    $time = $_POST['time'];

    $sql = "update reserve set medical = ?, symptom = ?, date = ?, time = ? where id = ?";

    $stmt = $mysqli->prepare($sql);
    
    $stmt->bind_param("sssss", $medical, $symptom, $formatted_date, $time, $id);

    if($stmt->execute()) {
        echo "<script>location.replace('user_info.php');</script>";
    }
    
    mysqli_close($mysqli);
?>