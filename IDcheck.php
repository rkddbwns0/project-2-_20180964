<?php
    $host = "localhost";
    $user = "kyj";
    $pw = "1234";
    $dbname = "proj";
    $mysqli = new mysqli($host, $user, $pw, $dbname);

    $id = $_POST['id'];

    $sql = "select * from user where id = ?";
    
    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param("s", $id);

    $stmt->execute();

    $stmt->store_result();

    if($stmt->num_rows > 0) {
        $response = array('available' => false);
    } else {
        $response = array('available' => true);
    }

    echo json_encode($response);

    $stmt->close();
    $mysqli->close();
?>





