<?php
    session_start();

    $host = "localhost";
    $user = "kyj";
    $pw = "1234";
    $dbname = "proj";
    $mysqli = new mysqli($host, $user, $pw, $dbname);

    $id = $_SESSION['id'];
    $newPw = $_POST['pw'];
    $newPwc = $_POST['pwc'];
 
    $selectSql = "select pw from user where id = '$id'";

    $result = $mysqli->query($selectSql);
    $row = $result->fetch_assoc();
    $curpw = $row['pw'];

    if ($newPw === $curpw) {
        echo "<script>alert('이미 사용 중인 비밀번호입니다.');</script>";
        echo "<script>history.back();</script>";
    } else if($newPw == "" || $newPwc == "") {
        echo "<script>alert('비밀번호를 입력해주세요.');</script>";
        echo "<script>history.back();</script>";
    }

    if($newPw === $newPwc) {
        $sql = "update user set pw = ?, pwc = ? where id = '$id'";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ss", $newPw, $newPwc);

        if($stmt->execute()) {
            echo "<script>alert('정보가 변경되었습니다. 다시 로그인해주세요.');</script>";
            echo "<script>location.href = 'change_logout.php'</script>";
        }
    } else {
        echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
        echo "<script>history.back();</script>";
    }

    mysqli_close($mysqli);
?>

